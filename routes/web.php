<?php

use League\Uri\UriTemplate\Operator;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\OperatorDepartemenController;
use App\Http\Controllers\KalenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\InformasiOperatorController;


Route::get('/dashboard', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function () {
    return view('Panel.users.user');
});

Route::get('/notifikasi', function () {})->name('dashboard');
Route::get('/notifikasi', function () {

    return view('Panel.notifikasi.notifikasi');
})->name('notifikasi');

Route::get('/history', function () {
    return view('Panel.history.history');
})->name('history');


Route::get('/operator', function () {
    return view('Panel.users.operator.operator');
})->name('user');
Route::get('/users', function () {
    return view('Panel.users.user');
})->name('users');



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submit'])->name('login.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('UserAccess:1,2,3')->group(function () {
        Route::get('/informasi/create', [InformasiController::class, 'create'])->name('create.info');
    });

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/op', [InformasiOperatorController::class, 'index'])->name('get.info.op');
    Route::get('/informasi', [InformasiController::class, 'index'])->name('get.info');
    Route::post('/create', [InformasiController::class, 'store'])->name('post.info');
    Route::delete('informasi/destroy/{id}', [InformasiController::class, 'destroy'])->name('destroy.info');
    Route::get('kategori/list', [InformasiController::class, 'getKategoriList'])->name('kategori.list');
    Route::get('/informasi/{id}', [InformasiController::class, 'show'])->name('show.info');
    Route::get('informasi/data', [InformasiController::class, 'getData'])->name('informasi.data');
    Route::get('/informasi/export/excel', [informasiController::class, 'exportexcel'])->name('export.excel.informasi');
    Route::get('/informasi/export/pdf', [informasiController::class, 'exportpdf'])->name('export.pdf.informasi');
    Route::get('/informasi/export/word', [informasiController::class, 'exportword'])->name('export.word.informasi');


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
    Route::get('/siswa/export/excel', [SiswaController::class, 'exportexcel'])->name('export.excel.siswa');
    Route::get('/siswa/export/pdf', [SiswaController::class, 'exportpdf'])->name('export.pdf.siswa');
    Route::get('/siswa/export/word', [SiswaController::class, 'exportword'])->name('export.word.siswa');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');


    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
    Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
    Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit');
    Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
    Route::put('/departemen/{id}/update', [DepartemenController::class, 'update'])->name('departemen.update');
    Route::get('/departemen/{id}/destroy', [DepartemenController::class, 'destroy'])->name('departemen.destroy');
    Route::get('/departemen/export/excel', [departemenController::class, 'exportexcel'])->name('export.excel.departemen');
    Route::get('/departemen/export/pdf', [departemenController::class, 'exportpdf'])->name('export.pdf.departemen');
    Route::get('/departemen/export/word', [departemenController::class, 'exportword'])->name('export.word.departemen');


    Route::get('/Opdept', [OperatorDepartemenController::class, 'index'])->name('get.op');
    Route::get('/Opdept/create', [OperatorDepartemenController::class, 'create'])->name('create.op');
    Route::post('/Opdept/store', [OperatorDepartemenController::class, 'store'])->name('store.op');
    Route::get('/Opdept/{id}/edit', [OperatorDepartemenController::class, 'edit'])->name('edit.op');
    Route::put('/Opdept/{id}/update', [OperatorDepartemenController::class, 'update'])->name('update.op');
    Route::get('/Opdept/{id}/destroy', [OperatorDepartemenController::class, 'destroy'])->name('destroy.op');
    Route::get('/Opdept/export/excel', [OperatorDepartemenController::class, 'exportexcel'])->name('export.excel.op');
    Route::get('/Opdept/export/pdf', [OperatorDepartemenController::class, 'exportpdf'])->name('export.pdf.op');
    Route::get('/Opdept/export/word', [OperatorDepartemenController::class, 'exportword'])->name('export.word.op');


    Route::get('/guru', [GuruController::class, 'index'])->name('get.guru');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('create.guru');
    Route::get('/guru/{id}/{id_user}/edit', [GuruController::class, 'edit'])->name('edit.guru');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('store.guru');
    Route::put('/guru/{id}/{id_user}/update', [GuruController::class, 'update'])->name('update.guru');
    Route::delete('/guru/{id}/{id_user}/destroy', [GuruController::class, 'destroy'])->name('destroy.guru');
    Route::get('/guru/export/excel', [GuruController::class, 'exportexcel'])->name('export.excel.guru');
    Route::get('/guru/export/pdf', [GuruController::class, 'exportpdf'])->name('export.pdf.guru');
    Route::get('/guru/export/word', [GuruController::class, 'exportword'])->name('export.word.guru');
    Route::post('/guru/import', [GuruController::class, 'import'])->name('guru.import');

    Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
    Route::get('/kalender/events', [KalenderController::class, 'fetchEvents'])->name('kalender.events');
    Route::post('/kalender/store', [KalenderController::class, 'store'])->name('kalender.store');
    Route::delete('/kalender/{id}/destroy', [KalenderController::class, 'destroy'])->name('kalender.destroy');
});
