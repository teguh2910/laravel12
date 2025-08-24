<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\PetiKemasController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Admin\PengirimBarangController;
use App\Http\Controllers\Admin\PenjualBarangController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/documents', [HomeController::class, 'store'])->name('documents.store');
Route::delete('/documents/{document}', [HomeController::class, 'destroy'])->name('documents.destroy');

// Document routes
Route::resource('documents', DocumentController::class)->except(['index', 'store', 'destroy']);
Route::post('/documents/generate-nomor-aju', [DocumentController::class, 'generateNomorAju'])->name('documents.generate-nomor-aju');

// Nested routes for Kemasan, Peti Kemas, and Barang
Route::prefix('documents/{document}')->group(function () {
    Route::resource('kemasan', KemasanController::class)->except(['create', 'edit']);
    Route::resource('peti-kemas', PetiKemasController::class)->except(['create', 'edit']);
    Route::resource('barang', BarangController::class)->except(['create', 'edit']);
});

// API routes for AJAX requests
Route::prefix('api')->group(function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('api.barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('api.barang.store');
    Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('api.barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('api.barang.destroy');
    
    // Reference data routes
    Route::get('/pengirim-barang', [\App\Http\Controllers\Api\ReferenceDataController::class, 'getPengirimBarang'])->name('api.pengirim-barang');
    Route::get('/penjual-barang', [\App\Http\Controllers\Api\ReferenceDataController::class, 'getPenjualBarang'])->name('api.penjual-barang');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pengirim-barang', PengirimBarangController::class);
    Route::resource('penjual-barang', PenjualBarangController::class);
});
