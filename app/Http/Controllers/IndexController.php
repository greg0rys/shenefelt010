<?php

namespace App\Http\Controllers;

use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->get();
        $users->loadCount('posts');
        return view('welcome', compact('users'));
    }
}
