<?php

use App\Http\Controllers\UserActionController;
use Illuminate\Support\Facades\Route;

// Imports at the top
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Public Routes (Accessible by anyone)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Must be Logged In)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('dashboard');
        })
            ->name('dashboard');

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');

        // --- YOUR APP ROUTES GO HERE ---

        // Posts (Specific routes MUST go before Resource routes)
        Route::delete('/posts/{post}/del1', [UserPostController::class, 'destroy'])
            ->name('posts.destroy.custom');
        Route::get('/posts/deleted-posts', [UserPostController::class, 'deletedPosts'])
            ->name('posts.deleted');
        Route::resource('posts', UserPostController::class);

        Route::resource('/userActions', UserActionController::class);

        // Users (Admin check should ideally be here)
        Route::get('/users/deleted-users', [UserController::class, 'deletedUsers'])
            ->name('users.deleted');

        // If you want ONLY admins to see users, add 'admin' middleware here:
        // Route::middleware('admin')->resource('users', UserController::class);
        // Otherwise, for standard access:
        Route::resource('users', UserController::class);

        Route::resource('items', InventoryItemController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('logTypes', LogTypeController::class);

    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
