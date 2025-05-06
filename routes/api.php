<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformasiController;

Route::get('/informasi', [InformasiController::class, 'indexapp']);
