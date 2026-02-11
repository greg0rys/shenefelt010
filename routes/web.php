<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::resource('posts', UserPostController::class);
Route::resource('logTypes', LogTypeController::class);

Route::get('/users/deleted-users', [UserController::class, 'deletedUsers'])->name('deletedUsers');
Route::resource('users', UserController::class);

Route::resource('items', InventoryItemController::class);

Route::resource('companies', CompanyController::class);
