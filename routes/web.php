<?php
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


// Route::resource('departemen', DepartemenController::class);
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
Route::get('/departemen', [DepartemenController::class, 'show'])->name('departemen.index');
Route::delete('/departemen/{id}', [DepartemenController::class, 'destroy'])->name('departemen.destroy');
Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen.store');









