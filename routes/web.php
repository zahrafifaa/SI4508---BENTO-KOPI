<?php

use App\Http\Controllers\KolaborasiController;
use App\Http\Controllers\LowonganController;
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

Route::get('kolaborasi', [KolaborasiController::class, 'index'])->name('kolaborasi.index');
Route::get('kolaborasi/ajukan', [KolaborasiController::class, 'create'])->name('kolaborasi.create');
Route::post('kolaborasi/ajukan', [KolaborasiController::class, 'proses'])->name('kolaborasi.proses');
Route::get('kolaborasi/{id}', [KolaborasiController::class, 'show'])->name('kolaborasi.show');

Route::get('lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('lowongan/{id}', [LowonganController::class, 'show'])->name('lowongan.show');
Route::get('lowongan/{id}/apply', [LowonganController::class, 'apply'])->name('lowongan.apply');
Route::post('lowongan/{id}/apply', [LowonganController::class, 'proses'])->name('lowongan.proses');
