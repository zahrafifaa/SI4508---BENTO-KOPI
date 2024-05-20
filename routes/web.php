<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\CekAdmin;
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
Route::get('/menu', [MenuController::class, 'menu'])->name('allmenu');
Route::get('/menu/search', [MenuController::class, 'searchMenu'])->name('searchMenu');
Route::get('/menu/{kategori}/search', [MenuController::class, 'searchMenuByCategory'])->name('searchMenuByCategory');
Route::get('/menu/sort/{option}', [MenuController::class, 'sortmenu'])->name('sortmenu');
Route::get('/menu/{kategori}/', [MenuController::class, 'showMenuByCategory'])->name('showmenubycategory');
Route::get('/menu/{kategori}/{option}', [MenuController::class, 'sortShowMenuByCategory'])->name('sortshowmenubycategory');
Route::prefix('admin')->middleware([CekAdmin::class])->group(function () {
    Route::get('/menu-makanan', [MenuController::class, 'adminMenuMakanan'])->name('admin.menu.makanan');
    Route::delete('/destroy-menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
    Route::get('/menu-minuman', [MenuController::class, 'adminMenuMinuman'])->name('admin.menu.inuman');
    Route::put('/update-menu', [MenuController::class, 'adminUpdate'])->name('admin.update.menu');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/tambah-menu', function () {
        return view('admin.tambah-menu');
    })->name('admin.tambah.menu');
    Route::post('/tambah-menu', [MenuController::class, 'adminStore'])->name('admin.store.menu');
});
Route::get('/login-admin', function () {
    return view('login-admin');
})->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'login']);
Route::get('/dashboardadmin', function () {
    return view('admin.dashboard-admin');
});