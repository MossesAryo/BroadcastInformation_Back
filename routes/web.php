<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;


Route::get('/', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function() {
    return view('Panel.users.user');
});


Route::get('/siswa', function() {
    return view('Panel.users.siswa');
});

Route::get('/informasi', function() {
    return view('Panel.informasi.informasi');
});

Route::get('/guru', function() {
    return view('Panel.users.guru');
});

// Route::get('/departemen', function() {
//     return view('Panel.users.departemen.departemen');   
// }) ->name('departemen');

Route::get('/notifikasi', function() {
    return view('Panel.notifikasi.notifikasi');
})->name('notifikasi');

Route::get('/history', function() {
    return view('Panel.history.history');
})->name('history');

Route::get('/kalender', function() {
    return view('Panel.kalender.kalender');
})->name('user');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Route::resource('departemen', DepartemenController::class);
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
Route::get('/departemen', [DepartemenController::class, 'show'])->name('departemen.index');
Route::delete('/departemen/{id}', [DepartemenController::class, 'destroy'])->name('departemen.destroy');
Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen.store');








Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::get('/siswa/{id}/{id_user}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');

Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::put('/siswa/{id}/{id_user}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/{id}/{id_user}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');

