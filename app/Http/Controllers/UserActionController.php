<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use App\Http\Requests\StoreUserActionRequest;
use App\Http\Requests\UpdateUserActionRequest;

class UserActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all = UserAction::with(['user'])->get();
        return view('userActions.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserActionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAction $userAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAction $userAction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserActionRequest $request, UserAction $userAction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAction $userAction)
    {
        //
    }
}
