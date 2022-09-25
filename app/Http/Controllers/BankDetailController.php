<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankDetailRequest;
use App\Http\Requests\UpdateBankDetailRequest;
use App\Models\BankDetail;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class BankDetailController extends Controller
{
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
     * @param  \App\Http\Requests\StoreBankDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankDetailRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only(['user_id']);

            // Check if exist in db
            $user = User::where('uuid', $validated['user_id'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            // Destructure foreign keys
            $user_id = $user->id;

            // Property Object (Model)
            $bankDetail = new BankDetail();

            // Iterating validated data and adding it to bankDetail object
            // This is to make sure that exempted payload data are not include in the bankDetail object
            // and to remove foreign keys
            foreach ($request->safe()->except(['user_id']) as $key => $value) {
                $bankDetail->$key = $value;
            }

            $bankDetail->uuid = Uuid::uuid4();
            $bankDetail->user_id = $user_id;
            $bankDetail->save();


            return response()->json([
                'success' => true,
                'data' => $bankDetail,
                'message' => 'New bank details added successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankDetailRequest  $request
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankDetailRequest $request, BankDetail $bankDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankDetail $bankDetail)
    {
        //
    }
}
