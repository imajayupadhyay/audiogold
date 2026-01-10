<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
|
*/

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Guest routes (login)
    Route::middleware('guest')->group(function () {
        Route::get('/audiogold-secure-login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/audiogold-secure-login', [AuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // User Management
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
