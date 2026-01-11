<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

        // Inquiry Management
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::post('/inquiries/{inquiry}/toggle-read', [InquiryController::class, 'toggleRead'])->name('admin.inquiries.toggleRead');
        Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');

        // Newsletter Management
        Route::get('/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter.index');
        Route::post('/newsletter/{subscription}/toggle-status', [NewsletterController::class, 'toggleStatus'])->name('admin.newsletter.toggleStatus');
        Route::delete('/newsletter/{subscription}', [NewsletterController::class, 'destroy'])->name('admin.newsletter.destroy');

        // Category Management
        Route::resource('categories', CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        // Product Management
        Route::resource('products', ProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
