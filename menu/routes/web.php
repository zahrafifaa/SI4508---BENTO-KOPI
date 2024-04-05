<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/menuapi', function () {
    return view('menuapi');
});
Route::get('/menu/search', [MenuController::class, 'searchMenu'])->name('searchMenu');
Route::get('/menu/{kategori}/search', [MenuController::class, 'searchMenuByCategory'])->name('searchMenuByCategory');
Route::get('/menu', [MenuController::class, 'menu'])->name('allmenu');
Route::get('/menu/sort/{option}', [MenuController::class, 'sortmenu'])->name('sortmenu');
Route::get('/menu/{kategori}/', [MenuController::class, 'showMenuByCategory'])->name('showmenubycategory');
Route::get('/menu/{kategori}/{option}', [MenuController::class, 'sortShowMenuByCategory'])->name('sortshowmenubycategory');