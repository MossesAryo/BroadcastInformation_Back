<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Panel.dashboard');
});

Route::get('/users', function() {
    return view('Panel.users.user');
});

Route::get('/informasi', function() {
    return view('Panel.informasi.informasi');
});

Route::get('/guru', function() {
    return view('Panel.users.guru');
});
