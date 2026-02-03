<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = UserPost::with('user')        // 1. Eager load 'user' FIRST (efficient SQL)
        ->orderBy('created_at', 'desc') // 2. Sort in Database (faster than PHP)
        ->get()                    // 3. Execute query
        ->groupBy('user_id');      // 4. Group results for the view

        return view('posts.index', ['posts' => $posts]);
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
    public function store(StoreUserPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPost $userPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPost $userPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPostRequest $request, UserPost $userPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPost $userPost)
    {
        //
    }
}
