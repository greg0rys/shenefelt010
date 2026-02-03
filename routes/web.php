<?php

use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.index');
});

Route::resource('posts', UserPostController::class);
Route::resource('logTypes', LogTypeController::class);
Route::resource('users', UserController::class);
