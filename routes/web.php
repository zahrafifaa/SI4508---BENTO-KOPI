<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda"
    ]);
});


Route::get('/menu', function () {
    return view('menu', [
        "title" => "Menu"
    ]);
});

Route::get('/reservasi', function () {
    return view('reservasi', [
        "title" => "Reservasi"
    ]);
});

Route::get('/kolaborasi', function () {
    return view('kolaborasi', [
        "title" => "Kolaborasi"
    ]);
});

Route::get('/artikel', function () {
    return view('artikel', [
        "title" => "Artikel"
    ]);
});

Route::get('/location', function () {
    return view('location', [
        "title" => "Location"
    ]);
});

Route::get('/apply', function () {
    return view('apply', [
        "title" => "Apply"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});