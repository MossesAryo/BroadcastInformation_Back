<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InformasiController;

Route::get('/informasi', [InformasiController::class, 'indexAPI']);


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'apiLogin']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'apiLogout']);
        Route::get('/profile', [AuthController::class, 'apiProfile']);
    });
});