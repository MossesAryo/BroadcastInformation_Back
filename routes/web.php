<?php


use League\Uri\UriTemplate\Operator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\OperatorDepartemenController;

Route::get('/', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function() {
    return view('Panel.users.user');
});



Route::get('/notifikasi', function() {
    return view('Panel.notifikasi.notifikasi');
})->name('notifikasi');

Route::get('/history', function() {
    return view('Panel.history.history');
})->name('history');


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
Route::get('/informasi/{id}', [InformasiController::class, 'show'])->name('show.info');
Route::get('informasi/data', [InformasiController::class, 'getData'])->name('informasi.data');
Route::get('kategori/list', [InformasiController::class, 'getKategoriList'])->name('kategori.list');


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
Route::delete('/siswa/{id}/{id_user}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');


Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
Route::put('/departemen/{id}/update', [DepartemenController::class, 'update'])->name('departemen.update');
Route::get('/departemen/{id}/destroy', [DepartemenController::class, 'destroy'])->name('departemen.destroy');

Route::get('/Opdept', [OperatorDepartemenController::class, 'index'])->name('get.op');
Route::get('/Opdept/create', [OperatorDepartemenController::class, 'create'])->name('create.op');
Route::post('/Opdept/store', [OperatorDepartemenController::class, 'store'])->name('store.op');
Route::get('/Opdept/{id}/edit', [OperatorDepartemenController::class, 'edit'])->name('edit.op');
Route::put('/Opdept/{id}/update', [OperatorDepartemenController::class, 'update'])->name('update.op');
Route::get('/Opdept/{id}/destroy', [OperatorDepartemenController::class, 'destroy'])->name('destroy.op');

Route::get('/guru', [GuruController::class, 'index'])->name('get.guru');
Route::get('/guru/create', [GuruController::class, 'create'])->name('create.guru');
Route::get('/guru/{id}/{id_user}/edit', [GuruController::class, 'edit'])->name('edit.guru');
Route::post('/guru/store', [GuruController::class, 'store'])->name('store.guru');
Route::put('/guru/{id}/{id_user}/update', [GuruController::class, 'update'])->name('update.guru');
Route::get('/guru/{id}/{id_user}/destroy', [GuruController::class, 'destroy'])->name('destroy.guru');


Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
Route::get('/kalender/events', [KalenderController::class, 'fetchEvents'])->name('kalender.events');
Route::post('/kalender/store', [KalenderController::class, 'store'])->name('kalender.store');
Route::delete('/kalender/{id}/destroy', [KalenderController::class, 'destroy'])->name('kalender.destroy');

