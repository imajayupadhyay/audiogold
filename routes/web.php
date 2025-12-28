<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
})->name('home');

Route::get('/products', function () {
    return Inertia::render('Products/Index');
})->name('products');

Route::get('/contact', function () {
    return Inertia::render('Contact/Index');
})->name('contact');

Route::get('/support', function () {
    return Inertia::render('Support/Index');
})->name('support');

Route::get('/faq', function () {
    return Inertia::render('Faq/Index');
})->name('faq');

Route::get('/about', function () {
    return Inertia::render('About/Index');
})->name('about');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
