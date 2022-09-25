<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Saving;
use App\Models\User;
use App\Models\PaymentAuthorization;
use App\Models\Transaction;
use Ramsey\Uuid\Uuid;


class RecurringSavings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurring:savings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto charge user bank account base on their savings frequencies and periods and update their wallet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            // Fetch all incompleted savings
            $savings = Saving::where('is_completed', '=', 0)->first();

            if(!$savings){
                return $this->info('No savings found');
            }
            // Each saviings
            foreach($savings as $saving){
                // Date difference
                $isGreaterThan = $this->isGreater($saving);
                // Get the frequency and period
                switch ($saving->frequency) {
                    case 'daily':
                        # current date (today) exceeded period days
                        if(!$isGreaterThan){
                            // completed
                            $this->completed($saving);
                            break;
                        }
                       // Process
                       $this->process($saving);
                        break;
                    case 'weekly':
                        # current date (today) exceeded period days
                        if(!$isGreaterThan){
                            // completed
                            $this->completed($saving);
                            break;
                        }

                        $difference = dateDifference($saving);
                        // check if created date is a week today
                        if($difference % 7 === 0){
                            // Process
                            $this->process($saving);
                        }

                        break;
                    case 'monthly':
                        # current date (today) exceeded period days
                        if(!$isGreaterThan){
                            // completed
                            $this->completed($saving);
                            break;
                        }

                        $difference = dateDifference($saving);
                        // check if created date is a week today
                        if($difference % 30 === 0){
                            // Process
                            $this->process($saving);
                        }
                        break;
                    case 'quarterly':
                        # current date (today) does not exceed period days
                        if(!$isGreaterThan){
                            // completed
                            $this->completed($saving);
                            break;
                        }

                        $difference = dateDifference($saving);
                        // check if created date is a week today
                        if($difference % 90 == 0){
                            // Process
                            $this->process($saving);
                        }
                        break;

                    default:
                        $this->info('No saving frequency');
                        break;
                }
            }

            $this->info('All recurring savings charged');
        } catch (\Throwable $th) {
            //throw $th;
            $this->info("Unable to make recurring charges. $th");
        }
    }

    // The process
    private function process(Saving $options)
    {
        try {
            // Charge user
            $makeCharges = $this->chargeUser($options);
            $reference = $makeCharges['data']['reference'];

            if ($makeCharges['status'] && $makeCharges['data']['status'] === 'success') {
                // Increment user balance
                $options->user->increment('balance', $options->amount);
                // Log transaction
                return $this->transaction($options, $reference);
            }

            $newTransaction = new Transaction();
            $newTransaction->uuid = Uuid::uuid4();
            $newTransaction->user_id = $options->user->id;
            $newTransaction->reference = $reference;
            $newTransaction->destination = 'wallet';
            $newTransaction->paymentGateway = 'PAYSTACK';
            $newTransaction->narration = 'Recurring charges to wallet failed!' . $makeCharges['data']['gateway_response'];
            $newTransaction->channel = $decode['data']['channel'];
            $newTransaction->amount = $options->amount;
        //   FIXME: change beneficiary to user
            $newTransaction->beneficiaryBalanceBefore = $options->user->balance;
            $newTransaction->beneficiaryBalanceAfter = $options->user->balance;
            $newTransaction->status = 'FAILED';
            $newTransaction->type = 'SAVINGS';
            return;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // complete savings
    private function completed(Saving $options)
    {
        // set payment completed
        $saving->is_completed = 1;
        return $saving->save();
    }

    // Make recurring charges
    private function chargeUser($options)
    {
        try {
            //code...
            $KEY =  config('app.PAYSTACK_SECRET');
            // Get user payment auth code
            $payment = PaymentAuthorization::where('user_id', '=', $options['id'])->first();
            $authCode = $payment->authorizationCode;
            // Charge authorization
            $url = "https://api.paystack.co/transaction/charge_authorization";
            $fields = [
                'email' => $payment->user->email,
                'amount' => $options['amount'],
                'authorization_code' => $authCode,
            ];
            
            $fields_string = http_build_query($fields);
            //open connection
            $curl = curl_init();
            
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
            
            //execute post
            $result = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $response = json_decode($result, true);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private function dateDifference(Saving $options)
    {
        // Today
        $now= new DateTime();
        // Savings created date 
        $dateCreated= new DateTime ($options->created_at);
        // difference between created date and today
        $diff=$now->diff($dateCreated);
        $days = $diff->days;
        return $days;
    }

    /**
     * Date difference
     * @param Saving
     * @return Boolean
     */
    private function isGreater(Saving $options)
    {
        $difference = $this->dateDifference($options);
        // Check if period days greater than day difference
        if($options->period > $difference){
            return true;
        }
        return false;
    }

    private function transaction(Saving $options, $reference)
    {
        try {
            // Reference
            // $reference = 'RC-' .Str::random(30); // RC recurring charges
            $newTransaction = new Transaction();
            $newTransaction->uuid = Uuid::uuid4();
            $newTransaction->user_id = $options->user->id;
            $newTransaction->reference = $reference;
            $newTransaction->destination = 'wallet';
            $newTransaction->paymentGateway = 'PAYSTACK';
            $newTransaction->narration = 'Recurring charges to wallet';
            $newTransaction->channel = 'web';
            $newTransaction->amount = $options->amount;
        //   FIXME: change beneficiary to user
            $newTransaction->beneficiaryBalanceBefore = $options->user->balance - $amount;
            $newTransaction->beneficiaryBalanceAfter = $options->user->balance;
            $newTransaction->status = 'SUCCESS';
            $newTransaction->type = 'SAVINGS';
            return $newTransaction->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
