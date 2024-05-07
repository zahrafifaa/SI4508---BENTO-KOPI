<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardKollabController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/menuapi', function () {
    return view('menuapi');
});
Route::get('/menu/search', [MenuController::class, 'searchMenu'])->name('searchMenu');
Route::get('/menu/{kategori}/search', [MenuController::class, 'searchMenuByCategory'])->name('searchMenuByCategory');
Route::get('/menu', [MenuController::class, 'menu'])->name('allmenu');
Route::get('/menu/sort/{option}', [MenuController::class, 'sortmenu'])->name('sortmenu');
Route::get('/menu/{kategori}/', [MenuController::class, 'showMenuByCategory'])->name('showmenubycategory');
Route::get('/menu/{kategori}/{option}', [MenuController::class, 'sortShowMenuByCategory'])->name('sortshowmenubycategory');

Route::post('/menu/{menu}/favorite', [FavoriteController::class, 'store'])->name('storeMenu')->middleware('auth');
Route::delete('/favorite/delete/{favorite}', [FavoriteController::class, 'destroy'])->name('destroyMenu')->middleware('auth');

// Route::post('/favorites/{menuId}', [FavoriteController::class, 'toggleFavorite'])->name('favorites');
// Route::get('/favorites', [FavoriteController::class, 'getFavorites']);

Route::get('/', [BerandaController::class, 'beranda']);

Route::get('/reservasi', function () {
    return view('reservasi', [
        "title" => "Reservasi",
        "active" => "Reservasi",
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validate-forgot-password/{token}', [LoginController::class, 'validate_forgot_password'])->name('validate-forgot-password');
Route::post('/validate-forgot-password-act', [LoginController::class, 'validate_forgot_password_act'])->name('validate-forgot-password-act');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view("dashboard.index");
})->middleware('auth');

Route::get('/dashboard/kolaborator/new', function () {
    return view("dashboard.kollaborator.new");
})->middleware('auth');

Route::get('/dashboard/kolaborator/{id}', [DashboardKollabController::class, 'show'])->name('kollab')->middleware('auth');
Route::resource('/dashboard/kolaborator', DashboardKollabController::class)->middleware('auth');

