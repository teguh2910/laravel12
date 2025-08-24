<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\PetiKemasController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/documents', [HomeController::class, 'store'])->name('documents.store');
Route::delete('/documents/{document}', [HomeController::class, 'destroy'])->name('documents.destroy');

// Document routes
Route::resource('documents', DocumentController::class)->except(['index', 'store', 'destroy']);

// Nested routes for Kemasan and Peti Kemas
Route::prefix('documents/{document}')->group(function () {
    Route::resource('kemasan', KemasanController::class)->except(['create', 'edit']);
    Route::resource('peti-kemas', PetiKemasController::class)->except(['create', 'edit']);
});
