<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes - Dynamic from database
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{category}/{slug}', [ProductController::class, 'showProduct'])->name('products.detail');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.category');

Route::get('/contact', function () {
    return Inertia::render('Contact/Index');
})->name('contact');

Route::get('/support', function () {
    return Inertia::render('Support/Index', [
        'supportSettings' => \App\Models\SupportPageSetting::getSettings(),
    ]);
})->name('support');

Route::get('/faq', function () {
    return Inertia::render('Faq/Index');
})->name('faq');

Route::get('/about', function () {
    return Inertia::render('About/Index', [
        'aboutSettings' => \App\Models\AboutPageSetting::getSettings(),
    ]);
})->name('about');

// Contact Form Submissions
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
Route::post('/newsletter/subscribe', [App\Http\Controllers\ContactController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// Admin routes
require __DIR__.'/admin.php';
