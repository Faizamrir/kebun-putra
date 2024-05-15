<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard-admin', function () {
//     return view('dashboard-admin');
// })->middleware(['auth', 'verified'])->name('dashboard-admin');

Route::controller(ProductController::class)->middleware(['auth', 'verified'])
->group(function () {
    Route::get('/dashboard-admin', 'index')->name('dashboard-admin');
    Route::post('/product-store', 'store')->name('product-store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
