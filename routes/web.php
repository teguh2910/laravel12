<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\PetiKemasController;
use App\Http\Controllers\BarangController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/documents', [HomeController::class, 'store'])->name('documents.store');
Route::delete('/documents/{document}', [HomeController::class, 'destroy'])->name('documents.destroy');

// Document routes
Route::resource('documents', DocumentController::class)->except(['index', 'store', 'destroy']);

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
});
