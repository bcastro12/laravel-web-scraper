<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::middleware('auth')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::post('/carro', [CarController::class, 'store'])->name('store');
    Route::put('/carro/{id}', [CarController::class, 'update']);
    Route::delete('/carro/{id}', [CarController::class, 'destroy']);
    Route::get('/carro/create', [CarController::class, 'create'])->name('create');
    Route::get('/carro/{id}/edit', [CarController::class, 'edit']);

    Route::fallback(function () {
        abort(404);
    });
});
