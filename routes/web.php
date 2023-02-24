<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LapanganFutsal;
use App\Http\Controllers\TypeLapanganController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthController::class, 'user'])->name('user');
Route::get('userLogin', [AuthController::class, 'userLogin'])->name('userLogin');

// Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('signoutuser', [AuthController::class, 'signOutUser'])->name('signoutuser');
Route::get('profile', [AuthController::class, 'profileadmin'])->name('profile');
Route::put('profileedit/{user}', [AuthController::class, 'update'])->name('profileedit');
Route::resource('owner', OwnerController::class);
Route::resource('lapangan', LapanganFutsal::class);
Route::get('dashboard', [LapanganFutsal::class, 'dashboard'])->middleware('checkRole:admin,super-admin');
Route::resource('typelapangan', TypeLapanganController::class);
Route::resource('day', DaysController::class);
Route::resource('hour', hoursController::class);
Route::resource('price', PricesController::class);

// get tabel
Route::get('tabel-admin/{lapangan}', [ LapanganFutsal::class, 'tabeladmin'])->name('tabel-admin');
Route::get ('lapangan-harga/{lapangan}', [ LapanganFutsal::class, 'gettabel'] )->name('lapangan.harga');
Route::get ('tabel-user/{lapangan}', [ LapanganFutsal::class, 'tabel'] )->name('tabel.user');

//cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('order-all', [OrderController::class, 'GetAllOrder'])->name('order.getall');
Route::get ('order-detail/{order}', [OrderController::class, 'GetDetailOrder'] )->name('order.detail');
Route::post('mitrans-callback', [OrderController::class, 'callback'])->name('mitrans.callback');