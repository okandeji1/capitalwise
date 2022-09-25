<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavingRequest;
use App\Http\Requests\UpdateSavingRequest;
use App\Http\Requests\DepositPaystackRequest;
use App\Http\Requests\VerifyPaystackRequest;
use App\Http\Requests\WithdrawalRequest;
use App\Models\Saving;
use App\Models\User;
use App\Models\SavingsCategory;
use App\Models\Transaction;
use App\Models\PaymentAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SavingController extends Controller
{
    public function getSavings(Request $request)
    {
        try {
            foreach ($request->query() as $key => $value){
                $objKey = $key;
                $objValue = $value;
            }
             //code...
             $savings = Saving::where($objKey, '=', $objValue)
             ->orderBy('created_at', 'desc')
             ->get();
 
             return response()->json([
                'success' => true,
                'data' => $savings,
                'message' => 'Record(s) found',
            ], 200);
         } catch (\Throwable $th) {
             return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
         }
    }

    public function depositWalletWithPaystack(DepositPaystackRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Paystack key
            $KEY =  config('app.PAYSTACK_SECRET');
            // Reference
            $reference = 'PT-' .Str::random(30);
            // User
            $user_id = $request->safe()->only('user_id');
            $user = User::where('uuid', $user_id)->first();
            
            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 400);
            }
            // Category
            $category_id = $request->safe()->only('category');
            $category = SavingsCategory::where('category', $category_id)->first();

            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 400);
            }
            
            // Payloads
             $fields = array(
                'email' => $user->email,
                'amount' => $validated['amount'] * 100,
                'callback_url' => $validated['callback_url'],
                'reference' => $reference,
                'metadata' => array(
                    "custom_fields" => array(
                        'userId' => $validated['user_id'],
                        'category' => $validated['category'],
                        'frequency' => $validated['frequency'],
                        'period' => $validated['period'],
                    )
                )
            );
            $fields_string = http_build_query($fields);

             $curl = curl_init();

             $url = "https://api.paystack.co/transaction/initialize";

             //set the url, number of POST vars, POST data
            curl_setopt($curl,CURLOPT_URL, $url);
            curl_setopt($curl,CURLOPT_POST, true);
            curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $KEY",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $decode = json_decode($response, true);

            if ($decode['status']) {
                return response()->json([
                  'success' => true,
                  'message' => 'operation executed successfully',
                  'data' => $decode,
                ], 200);
              }

              return response()->json([
                'success' => false,
                'message' => 'funding of wallet failed',
                'data' => $decode,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    public function verifyWalletWithPaystack(VerifyPaystackRequest $request)
    {
        $KEY =  config('app.PAYSTACK_SECRET');
        foreach ($request->query() as $key => $value){
            $objKey = $key;
            $reference = $value;
        }

        try {
            $transaction = Transaction::where($objKey, '=', $reference)->first();
            
            if($transaction){
                return response()->json([
                    'success' => false,
                    'message' => 'transaction reference already registered'
                ], 400);
            }
             $curl = curl_init();

             curl_setopt_array($curl, array(
                 CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 30,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "GET",
                 CURLOPT_HTTPHEADER => array(
                     "Content-Type: application/json",
                     "Authorization: Bearer $KEY",
                     "Cache-Control: no-cache",
                 ),
             ));
 
             $response = curl_exec($curl);
             $err = curl_error($curl);
             curl_close($curl);
             $decode = json_decode($response, true);

            if ($decode['status'] && $decode['data']['status'] == 'success') {
                // Destructuring
                $userUuid = $decode['data']['metadata']['custom_fields']['userId'];
                $category = $decode['data']['metadata']['custom_fields']['category'];
                $frequency = $decode['data']['metadata']['custom_fields']['frequency'];
                $period = $decode['data']['metadata']['custom_fields']['period'];
                $amount = $decode['data']['amount'] / 100;
                $channel = $decode['data']['channel'];
                $reference = $decode['data']['reference'];
                $status = $decode['data']['status'];

                $authorizationCode = $decode['data']['authorization']['authorization_code'];
                $bin = $decode['data']['authorization']['bin'];
                $last4 = $decode['data']['authorization']['last4'];
                $exp_month = $decode['data']['authorization']['exp_month'];
                $exp_year = $decode['data']['authorization']['exp_year'];
                $channel = $decode['data']['authorization']['channel'];
                $card_type = $decode['data']['authorization']['card_type'];
                $bank = $decode['data']['authorization']['bank'];
                $country_code = $decode['data']['authorization']['country_code'];
                $brand = $decode['data']['authorization']['brand'];
                $reusable = $decode['data']['authorization']['reusable'];

                // Find user
                $user = User::where('uuid', $userUuid)->first();
                $user_id = $user->id;
                // Find Category
                $findCategory = SavingsCategory::where('category', $category)->first();
                $category_id = $findCategory->id;

                //   Update user balance
                $user->increment('balance', $amount);

                // Log savings
                $newSavings = new Saving();
                $newSavings->uuid = Uuid::uuid4();
                $newSavings->user_id = $user_id;
                $newSavings->category_id = $category_id;
                $newSavings->amount = $amount;
                $newSavings->frequency = $frequency;
                $newSavings->period = $period;
                $newSavings->save();

                // Log authorization for recurring charges
                $authorization = new PaymentAuthorization();
                $authorization->uuid = Uuid::uuid4();
                $authorization->user_id = $user_id;
                $authorization->authorizationCode = $authorizationCode;
                $authorization->bin = $bin;
                $authorization->last4 = $last4;
                $authorization->exp_month = $exp_month;
                $authorization->exp_year = $exp_year;
                $authorization->channel = $channel;
                $authorization->card_type = $card_type;
                $authorization->bank = $bank;
                $authorization->country_code = $country_code;
                $authorization->brand = $brand;
                $authorization->reusable = $reusable ? 1 : 0;
                $authorization->save();

                // Log transaction
                $newTransaction = new Transaction();
                $newTransaction->uuid = Uuid::uuid4();
                $newTransaction->user_id = $user_id;
                $newTransaction->reference = $reference;
                $newTransaction->destination = 'wallet';
                $newTransaction->paymentGateway = 'PAYSTACK';
                $newTransaction->narration = 'Normal savings to wallet';
                $newTransaction->channel = $channel;
                $newTransaction->amount = $amount;
                //   FIXME: change beneficiary to user
                $newTransaction->beneficiaryBalanceBefore = $user->balance - $amount;
                $newTransaction->beneficiaryBalanceAfter = $user->balance;
                $newTransaction->status = $status;
                $newTransaction->type = 'SAVINGS';
                $newTransaction->save();

                return response()->json([
                    'success' => true,
                    'message' => 'operation executed successfully',
                    'data' => $newSavings,
                ], 200);
            }

            // Log transaction
            $newTransaction = new Transaction();
            $newTransaction->uuid = Uuid::uuid4();
            $newTransaction->user_id = $user_id;
            $newTransaction->reference = $decode['data']['reference'];
            $newTransaction->destination = 'wallet';
            $newTransaction->paymentGateway = 'PAYSTACK';
            $newTransaction->narration = 'Normal savings to wallet';
            $newTransaction->channel = $decode['data']['channel'];
            $newTransaction->amount = $decode['data']['amount'] / 100;
            //   FIXME: change beneficiary to user
            $newTransaction->beneficiaryBalanceBefore = $user->balance;
            $newTransaction->beneficiaryBalanceAfter = $user->balance;
            $newTransaction->status = 'FAILED';
            $newTransaction->type = 'SAVINGS';
            $newTransaction->save();
            return response()->json([
                //
                'success' => false,
                'message' => 'funding of wallet failed',
                'data' => $decode,
            ], 500);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    public function withdrawalRequest(WithdrawalRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Paystack key
            $KEY =  config('app.PAYSTACK_SECRET');
            // Check user
            $user = User::where('uuid', $validated['user_id'])->first();
            // Check password
            if(!$user || !Hash::check($validated['password'], $user->password)){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid password'
                ], 401);
            }

            // Get user bank details
            $bankDetails = BankDetail::where('user_id', '=', $user->id)->first();

            // Verify bank details
            $curl = curl_init();

             curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=" . $bankDetails->accountNumber . "&bank_code=" . $bankDetails->bankCode,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer $KEY",
                    "Cache-Control: no-cache",
                ),
            ));
 
             $response = curl_exec($curl);
             $err = curl_error($curl);
             curl_close($curl);
             $decode = json_decode($response, true);

            if (!$decode['status']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Account number cannot be resolved',
                    'data' => $decode,
                ], 406);
            }

            // Create a transfer recipient
            $options = array(
                'type' => 'nuban',
                'name' => $user->uuid,
                'account_number' => $decode['data']['account_number'],
                'bank_code' => $bankDetails->bankCode,
                'currency' => 'NGN',
            );

            $ch = curl_init();
            $url = 'https://api.paystack.co/transferrecipient';

             //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $KEY",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

            $responseData = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);
            $createTransferRecipient = json_decode($responseData, true);

            if (!$createTransferRecipient['status']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request cannot be resolved! Please contact support',
                    'data' => $createTransferRecipient,
                ], 500);
            }

            // Initiate a transfer
            $data = array(
                'source' => 'balance',
                'amount' => $validated['amount'] * 100,
                'recipient' => $createTransferRecipient['data']['recipient_code'],
                'reason' => $validated['reason'],
            );

            $curlInit = curl_init();
            $url = 'https://api.paystack.co/transferrecipient';

             //set the url, number of POST vars, POST data
            curl_setopt($curlInit,CURLOPT_URL, $url);
            curl_setopt($curlInit,CURLOPT_POST, true);
            curl_setopt($curlInit,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($curlInit, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $KEY",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($curlInit,CURLOPT_RETURNTRANSFER, true);

            $res = curl_exec($curlInit);
            $err = curl_error($curlInit);
            curl_close($curlInit);
            $initTransfer = json_decode($res, true);

            if (!$initTransfer['status']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request cannot be resolved! Please contact support',
                    'data' => $initTransfer,
                ], 500);
            }

            //   Update user balance
            $user->decrement('balance', $validated['amount']);

            return response()->json([
              'success' => true,
              'message' => 'operation executed successfully',
              'data' => [
                  'reference' => $initTransfer['data']['reference'],
                  'amount' => $validated['amount'],
                  'beneficiary' => $bankDetails,
                  'sender' => $user
              ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    public function paystackWebHook(Request $request)
    {
        try {
            $reference = $request->dada->reference;
            $amount = $request->dada->amount / 100;
            $status = $request->dada->status;
            $user_id = $request->dada->recipient->name;
            $status = $request->dada->status;

            // Find user
            $user = User::where('uuid', $user_id)->first();

            // Log transaction
            $newTransaction = new Transaction();
            $newTransaction->uuid = Uuid::uuid4();
            $newTransaction->user_id = $user_id;
            $newTransaction->reference = $reference;
            $newTransaction->destination = 'bank';
            $newTransaction->paymentGateway = 'PAYSTACK';
            $newTransaction->narration = 'Withdraw to bank';
            $newTransaction->channel = 'web';
            $newTransaction->amount = $amount;
          //   FIXME: change beneficiary to user
            $newTransaction->beneficiaryBalanceBefore = $user->balance + $amount;
            $newTransaction->beneficiaryBalanceAfter = $user->balance;
            $newTransaction->status = $status;
            $newTransaction->type = 'WITHDRAWAL';
            $newTransaction->save();

            return response()->json([
                'success' => true,
                'data' => NULL,
                'message' => 'Notification received!',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSavingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function show(Saving $saving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function edit(Saving $saving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSavingRequest  $request
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingRequest $request, Saving $saving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saving $saving)
    {
        //
    }
}
