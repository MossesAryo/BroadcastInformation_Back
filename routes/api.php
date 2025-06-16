<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\KategoriController;

Route::get('/informasi', [InformasiController::class, 'indexAPI']);
Route::get('/kategori', [KategoriController::class, 'indexAPI']);
Route::prefix('auth')->group(function () {
    Route::post('/login', [ApiAuthController::class, 'apiLogin']);
});

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [ApiAuthController::class, 'apiLogout']);
        Route::get('/profile', [ApiAuthController::class, 'apiProfile']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});

