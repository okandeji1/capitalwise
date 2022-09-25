<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanCategory;
use Ramsey\Uuid\Uuid;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //code...
            $loans = Loan::with(['category', 'user'])->orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $loans,
                'message' => 'Loan(s) found',
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
     * @param  \App\Http\Requests\StoreLoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only(['user_id', 'category']);

            // Check if exist in db
            $user = User::where('uuid', $validated['user_id'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            $category = LoanCategory::where('category', $validated['category'])->first();

            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'category not found'
                ], 404);
            }

            // Destructure foreign keys
            $user_id = $user->id;
            $category_id = $category->id;

            // Property Object (Model)
            $loan = new Loan();
            // Iterating validated data and adding it to loan object
            // This is to make sure that exempted payload data are not include in the loan object
            // and to remove foreign keys
            foreach ($request->safe()->except(['user_id', 'category']) as $key => $value) {
                $loan->$key = $value;
            }

            $loan->uuid = Uuid::uuid4();
            $loan->user_id = $user_id;
            $loan->category_id = $category_id;
            $loan->save();


            return response()->json([
                'success' => true,
                'data' => $loan,
                'message' => 'New loan added successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    public function approveLoan(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanRequest  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
