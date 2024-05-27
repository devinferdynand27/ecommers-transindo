<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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
Route::get('/login', function () {
    return view('login');
});
Route::get('/register/merchant', function () {
    return view('register');
});
Route::get('/register/custumer', function () {
    return view('register-custumer');
});
Route::get('/wishlist', function () {
    return view('wishlist');
});
Route::get('/transaksi-list', function () {
    return view('order-success');
});
Route::get('/order-success', function () {
    return view('order-success');
});

Route::post('search', [MemberController::class, 'search']);
Route::get('/search', function () {
    return view('search-get');
});

Route::get('/order-success/{sewa}', [TransaksiController::class, 'success'])->name('order-success');
Route::get('/detail/produk/{slug}', [MemberController::class, 'detail_produk']);

Route::post('login', [LoginController::class, 'login']);
Route::post('register-merchant', [LoginController::class, 'regsiter_merchant']);
Route::post('register-custumer', [LoginController::class, 'regsiter_custumer']);

Route::middleware(['Merchant'])->group(function () {
    Route::post('/merchant/logout', [LoginController::class, 'logout']);
    Route::get('merchant/dashboard', function () {
        return view('merchant.dashboard');
    });

    Route::get('/merchant/order', [TransaksiController::class, 'index']);

    Route::resource('/merchant/banner', BannerController::class);
    Route::resource('/merchant/kategori', KategoriController::class);
    Route::resource('/merchant/produk', ProdukController::class);
    Route::get('/merchant/kantor', [KantorController::class, 'index']);
    
    Route::put('/merchant/user/{user}', [KantorController::class, 'data_user']);
    Route::put('/merchant/kantor/{user}', [KantorController::class, 'data_kantor']);
});

Route::middleware(['Custumer'])->group(function () {
    Route::post('custumer/logout', [LoginController::class, 'logout']);
    Route::post('checkout/produk', [MemberController::class, 'checkout_get']);

});

