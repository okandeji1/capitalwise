<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmploymentRequest;
use App\Http\Requests\UpdateEmploymentRequest;
use App\Models\Employment;
use App\Models\User;

class EmploymentController extends Controller
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
     * @param  \App\Http\Requests\StoreEmploymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmploymentRequest $request)
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
            $employment = new Employment();

            // Iterating validated data and adding it to employment object
            // This is to make sure that exempted payload data are not include in the employment object
            // and to remove foreign keys and images
            foreach ($request->safe()->except(['user_id']) as $key => $value) {
                $employment->$key = $value;
            }

            $employment->uuid = Uuid::uuid4();
            $employment->user_id = $user_id;
            $employment->save();


            return response()->json([
                'success' => true,
                'data' => $employment,
                'message' => 'New employment added successfully'
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
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function show(Employment $employment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function edit(Employment $employment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmploymentRequest  $request
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmploymentRequest $request, Employment $employment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employment $employment)
    {
        //
    }
}
