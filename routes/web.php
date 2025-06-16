<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use League\Uri\UriTemplate\Operator;

// Controllers
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\OperatorDepartemenController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\Operator\InformasiOperatorController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submit'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    
    /*
    |--------------------------------------------------------------------------
    | Role-Based Access Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('UserAccess:1,2,3')->group(function () {
        Route::get('/informasi/create', [InformasiController::class, 'create'])->name('create.info');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Informasi Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('informasi')->name('informasi.')->group(function () {
        Route::get('/', [InformasiController::class, 'index'])->name('index');
        Route::get('/data', [InformasiController::class, 'getData'])->name('data');
        Route::get('/{id}', [InformasiController::class, 'show'])->name('show');
        Route::post('/create', [InformasiController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [InformasiController::class, 'destroy'])->name('destroy');
        
        // Export routes
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/excel', [InformasiController::class, 'exportexcel'])->name('excel');
            Route::get('/pdf', [InformasiController::class, 'exportpdf'])->name('pdf');
            Route::get('/word', [InformasiController::class, 'exportword'])->name('word');
        });
    });
    Route::get('/dashboard/op', [InformasiOperatorController::class, 'index'])->name('get.info.op');
    
    /*
    |--------------------------------------------------------------------------
    | Kategori Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
        Route::post('/store', [KategoriController::class, 'store'])->name('store');
        Route::put('/{id}/update', [KategoriController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [KategoriController::class, 'destroy'])->name('destroy');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Siswa Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::get('/create', [SiswaController::class, 'create'])->name('create');
        Route::get('/{id}/{id_user}/edit', [SiswaController::class, 'edit'])->name('edit');
        Route::post('/store', [SiswaController::class, 'store'])->name('store');
        Route::put('/{id}/{id_user}/update', [SiswaController::class, 'update'])->name('update');
        Route::delete('/{id}/{id_user}/destroy', [SiswaController::class, 'destroy'])->name('destroy');
        Route::post('/import', [SiswaController::class, 'import'])->name('import');
        
        // Export routes
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/excel', [SiswaController::class, 'exportexcel'])->name('excel');
            Route::get('/pdf', [SiswaController::class, 'exportpdf'])->name('pdf');
            Route::get('/word', [SiswaController::class, 'exportword'])->name('word');
        });
    });
    
    /*
    |--------------------------------------------------------------------------
    | Departemen Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('departemen')->name('departemen.')->group(function () {
        Route::get('/', [DepartemenController::class, 'index'])->name('index');
        Route::get('/create', [DepartemenController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [DepartemenController::class, 'edit'])->name('edit');
        Route::post('/store', [DepartemenController::class, 'store'])->name('store');
        Route::put('/{id}/update', [DepartemenController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [DepartemenController::class, 'destroy'])->name('destroy');
        
        // Export routes
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/excel', [DepartemenController::class, 'exportexcel'])->name('excel');
            Route::get('/pdf', [DepartemenController::class, 'exportpdf'])->name('pdf');
            Route::get('/word', [DepartemenController::class, 'exportword'])->name('word');
        });
    });
    
    /*
    |--------------------------------------------------------------------------
    | Operator Departemen Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('operator-departemen')->name('op.')->group(function () {
        Route::get('/', [OperatorDepartemenController::class, 'index'])->name('index');
        Route::get('/create', [OperatorDepartemenController::class, 'create'])->name('create');
        Route::get('/{IDOperator}/{ID_Departemen}/{username}/edit', [OperatorDepartemenController::class, 'edit'])->name('edit');
        Route::post('/store', [OperatorDepartemenController::class, 'store'])->name('store');
        Route::put('/{IDOperator}/{ID_Departemen}/{username}/update', [OperatorDepartemenController::class, 'update'])->name('update');
        Route::get('/{IDOperator}/{ID_Departemen}/{username}/destroy', [OperatorDepartemenController::class, 'destroy'])->name('destroy');
        
        // Export routes
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/excel', [OperatorDepartemenController::class, 'exportexcel'])->name('excel');
            Route::get('/pdf', [OperatorDepartemenController::class, 'exportpdf'])->name('pdf');
            Route::get('/word', [OperatorDepartemenController::class, 'exportword'])->name('word');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Guru Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/create', [GuruController::class, 'create'])->name('create');
        Route::get('/{id}/{id_user}/edit', [GuruController::class, 'edit'])->name('edit');
        Route::post('/store', [GuruController::class, 'store'])->name('store');
        Route::put('/{id}/{id_user}/update', [GuruController::class, 'update'])->name('update');
        Route::delete('/{id}/{id_user}/destroy', [GuruController::class, 'destroy'])->name('destroy');
        Route::post('/import', [GuruController::class, 'import'])->name('import');
        
        // Export routes
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/excel', [GuruController::class, 'exportexcel'])->name('excel');
            Route::get('/pdf', [GuruController::class, 'exportpdf'])->name('pdf');
            Route::get('/word', [GuruController::class, 'exportword'])->name('word');
        });
    });
    
    /*
    |--------------------------------------------------------------------------
    | Kalender Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('kalender')->name('kalender.')->group(function () {
        Route::get('/', [KalenderController::class, 'index'])->name('index');
        Route::get('/events', [KalenderController::class, 'fetchEvents'])->name('events');
        Route::post('/store', [KalenderController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [KalenderController::class, 'destroy'])->name('destroy');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Static Pages
    |--------------------------------------------------------------------------
    */
    Route::get('/history', function () {
        return view('Panel.history.history');
    })->name('history');
    
    Route::get('/users', function () {
        return view('Panel.users.user');
    })->name('users');
});