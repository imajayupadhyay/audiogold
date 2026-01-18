<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\SupportPageController;
use App\Http\Controllers\Admin\FaqPageController;
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

        // Homepage Management
        Route::get('/homepage', [HomepageController::class, 'index'])->name('admin.homepage.index');
        Route::post('/homepage/hero-slides', [HomepageController::class, 'storeHeroSlide'])->name('admin.homepage.hero-slides.store');
        Route::post('/homepage/hero-slides/{heroSlide}', [HomepageController::class, 'updateHeroSlide'])->name('admin.homepage.hero-slides.update');
        Route::delete('/homepage/hero-slides/{heroSlide}', [HomepageController::class, 'destroyHeroSlide'])->name('admin.homepage.hero-slides.destroy');
        Route::post('/homepage/settings', [HomepageController::class, 'updateSettings'])->name('admin.homepage.settings.update');
        Route::post('/homepage/settings/reset', [HomepageController::class, 'resetSettings'])->name('admin.homepage.settings.reset');

        // Footer Management
        Route::get('/footer', [FooterController::class, 'index'])->name('admin.footer.index');
        Route::post('/footer', [FooterController::class, 'update'])->name('admin.footer.update');
        Route::post('/footer/reset', [FooterController::class, 'reset'])->name('admin.footer.reset');

        // Contact Page Management
        Route::get('/contact-page', [ContactPageController::class, 'index'])->name('admin.contact-page.index');
        Route::post('/contact-page', [ContactPageController::class, 'update'])->name('admin.contact-page.update');
        Route::post('/contact-page/reset', [ContactPageController::class, 'reset'])->name('admin.contact-page.reset');

        // About Page Management
        Route::get('/about-page', [AboutPageController::class, 'index'])->name('admin.about-page.index');
        Route::post('/about-page', [AboutPageController::class, 'update'])->name('admin.about-page.update');
        Route::post('/about-page/reset', [AboutPageController::class, 'reset'])->name('admin.about-page.reset');

        // Support Page Management
        Route::get('/support-page', [SupportPageController::class, 'index'])->name('admin.support-page.index');
        Route::post('/support-page', [SupportPageController::class, 'update'])->name('admin.support-page.update');
        Route::post('/support-page/reset', [SupportPageController::class, 'reset'])->name('admin.support-page.reset');

        // FAQ Page Management
        Route::get('/faq-page', [FaqPageController::class, 'index'])->name('admin.faq-page.index');
        Route::post('/faq-page', [FaqPageController::class, 'update'])->name('admin.faq-page.update');
        Route::post('/faq-page/reset', [FaqPageController::class, 'reset'])->name('admin.faq-page.reset');

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
