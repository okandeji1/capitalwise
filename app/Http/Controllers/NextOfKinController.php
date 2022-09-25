<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNextOfKinRequest;
use App\Http\Requests\UpdateNextOfKinRequest;
use App\Models\NextOfKin;
use App\Models\User;

class NextOfKinController extends Controller
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
     * @param  \App\Http\Requests\StoreNextOfKinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNextOfKinRequest $request)
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
            $kin = new NextOfKin();

            // Iterating validated data and adding it to kin object
            // This is to make sure that exempted payload data are not include in the kin object
            // and to remove foreign keys and images
            foreach ($request->safe()->except(['user_id']) as $key => $value) {
                $kin->$key = $value;
            }

            $kin->uuid = Uuid::uuid4();
            $kin->user_id = $user_id;
            $kin->save();


            return response()->json([
                'success' => true,
                'data' => $kin,
                'message' => 'New kin added successfully'
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
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function show(NextOfKin $nextOfKin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function edit(NextOfKin $nextOfKin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNextOfKinRequest  $request
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNextOfKinRequest $request, NextOfKin $nextOfKin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function destroy(NextOfKin $nextOfKin)
    {
        //
    }
}
