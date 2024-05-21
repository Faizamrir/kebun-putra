<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')->with('products', \App\Models\Product::all());
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
    Route::put('/product-update/{id}', 'update')->name('product-update');
    Route::delete('/product-delete/{id}', 'destroy')->name('product-delete');
});

Route::controller(LaporanController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
    Route::get('/laporan-pdf/{date}', 'cetakpdf')->name('laporan-pdf');
});

Route::controller(PembelianController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/transaksi-admin', 'index')->name('transaksi-admin');
    Route::post('/approve/{id}', 'approve')->name('approve');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
