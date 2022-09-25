<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVerifyUserRequest;
use App\Http\Requests\UpdateVerifyUserRequest;
use App\Models\VerifyUser;

class VerifyUserController extends Controller
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
     * @param  \App\Http\Requests\StoreVerifyUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVerifyUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerifyUser  $verifyUser
     * @return \Illuminate\Http\Response
     */
    public function show(VerifyUser $verifyUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerifyUser  $verifyUser
     * @return \Illuminate\Http\Response
     */
    public function edit(VerifyUser $verifyUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVerifyUserRequest  $request
     * @param  \App\Models\VerifyUser  $verifyUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVerifyUserRequest $request, VerifyUser $verifyUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerifyUser  $verifyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerifyUser $verifyUser)
    {
        //
    }
}
