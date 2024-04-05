<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reservasi', function () {
    return view('reservasi.blade.php');
});

Route::get('/ketersediaanmeja', function () {
    return view('ketersediaanmeja.blade.php');
});