<?php

use App\Http\Controllers\KolaborasiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\ReservasiController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::get('reservasi/cek', [ReservasiController::class, 'cek'])->name('reservasi.cek');
Route::post('reservasi', [ReservasiController::class, 'submit'])->name('reservasi.submit')->middleware('auth');
Route::get('reservasi/{kode}', [ReservasiController::class, 'success'])->name('reservasi.success');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('location', App\Http\Controllers\Admin\LocationController::class);
    Route::resource('meja', App\Http\Controllers\Admin\MejaController::class);

    Route::get('reservasi/acc', [App\Http\Controllers\Admin\ReservasiController::class, 'acc'])->name('reservasi.acc');
    Route::resource('reservasi', App\Http\Controllers\Admin\ReservasiController::class)->only(['index', 'destroy']);
});
