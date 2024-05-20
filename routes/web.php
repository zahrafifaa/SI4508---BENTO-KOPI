<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardCashierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Cart;
use App\Models\DashboardCashier;
use App\Models\Menu;

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

Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda",
    ]);
});




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

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard',
        'active' => 'Dashboard'
    ]);
})->middleware('auth');

// Route::get('/cartMenu', [MenuController::class, 'indexs']);  
// Route::get('/shopping-cart', [MenuController::class, 'menuCart'])->name('shopping.cart');
// Route::get('/menus/{id}', [MenuController::class, 'addmenutoCart'])->name('addmenu.to.cart');
// Route::patch('/update-shopping-cart', [MenuController::class, 'updateCart'])->name('update.sopping.cart');
// Route::delete('/delete-cart-product', [MenuController::class, 'deleteProduct'])->name('delete.cart.product');

Route::post('/menu/{menu}/cart', [CartController::class, 'store'])->middleware('auth')->name('cart.store');
Route::GET('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::post('/cart/increase-quantity',  [CartController::class, 'increaseQuantity'])->name('cart.increaseQuantity');
Route::post('/cart/reduce-quantity',  [CartController::class, 'reduceQuantity'])->name('cart.reduceQuantity');
Route::post('/cart/store-message', [CartController::class, 'storeMessage'])->name('cart.storeMessage');
Route::post('/cart/order', [CartController::class, 'storeOrder'])->middleware('auth')->name('cart.storeOrder');


Route::get('/dashboardCashier', [DashboardCashierController::class, 'index'])->name('dashboard.cashier')->middleware('auth');

