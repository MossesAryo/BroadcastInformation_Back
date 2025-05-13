<?php


use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\OperatorDepartemenController;

Route::get('/', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function() {
    return view('Panel.users.user');
});


Route::get('/siswa', function() {
    return view('Panel.users.siswa');
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

Route::get('/operator', function() {
    return view('Panel.users.operator.operator');
})->name('user');


Route::get('/informasi', [InformasiController::class, 'index'])
->name('get.info');

Route::get('/informasi/create', [InformasiController::class, 'create'])
->name('create.info');
Route::post('/create', [InformasiController::class, 'store'])
->name('post.info');
Route::delete('informasi/destroy/{id}', [InformasiController::class, 'destroy'])
->name('destroy.info');
Route::get('/informasi/{id}', [App\Http\Controllers\InformasiController::class, 'show'])->name('show.info');


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::get('/siswa/{id}/{id_user}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::put('/siswa/{id}/{id_user}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/{id}/{id_user}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');


Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
Route::put('/departemen/{id}/update', [DepartemenController::class, 'update'])->name('departemen.update');
Route::get('/departemen/{id}/destroy', [DepartemenController::class, 'destroy'])->name('departemen.destroy');

Route::get('/Opdept', [OperatorDepartemenController::class, 'index'])->name('get.op');
Route::get('/Opdept/create', [OperatorDepartemenController::class, 'create'])->name('create.op');
Route::post('/Opdept/store', [OperatorDepartemenController::class, 'store'])->name('store.op');
Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::put('/departemen/{id}/update', [DepartemenController::class, 'update'])->name('departemen.update');
Route::get('/departemen/{id}/destroy', [DepartemenController::class, 'destroy'])->name('departemen.destroy');

