<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanCategoryRequest;
use App\Http\Requests\UpdateLoanCategoryRequest;
use App\Models\LoanCategory;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class LoanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = LoanCategory::all();
            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'category(s) found',
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
     * @param  \App\Http\Requests\StoreLoanCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanCategoryRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Save entity
            $category = new LoanCategory();
            foreach ($request->safe() as $key => $value) {
                $category->$key = Str::lower($value);
            }
            $category->uuid = Uuid::uuid4();
            $category->save();

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'New category created successfully',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanCategory  $loanCategory
     * @return \Illuminate\Http\Response
     */
    public function show(LoanCategory $loanCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanCategory  $loanCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanCategory $loanCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanCategoryRequest  $request
     * @param  \App\Models\LoanCategory  $loanCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanCategoryRequest $request, LoanCategory $loanCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanCategory  $loanCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanCategory $loanCategory)
    {
        //
    }
}
