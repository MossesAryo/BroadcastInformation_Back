<?php

use App\Http\Controllers\InformasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function() {
    return view('Panel.users.user');
});



Route::get('/departemen', function() {
    return view('Panel.users.departemen');
});

Route::get('/siswa', function() {
    return view('Panel.users.siswa');
});



Route::get('/guru', function() {
    return view('Panel.users.guru');
});
Route::get('/departemen', function() {
    return view('Panel.users.departemen');
});
Route::get('/notifikasi', function() {
    return view('Panel.notifikasi.notifikasi');
})->name('notifikasi');

Route::get('/history', function() {
    return view('Panel.history.history');
})->name('history');

Route::get('/users', function() {
    return view('Panel.users.user');
})->name('user');

Route::get('/informasi', [InformasiController::class, 'index'])
->name('get.info');

Route::get('/informasi/create', [InformasiController::class, 'create'])
->name('create.info');
Route::post('/create', [InformasiController::class, 'store'])
->name('post.info');
Route::delete('informasi/destroy/{id}', [InformasiController::class, 'destroy'])
->name('destroy.info');




