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
use App\Http\Controllers\OrderDetailController;
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
//login register logout change-password
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('signoutuser', [AuthController::class, 'signOutUser'])->name('signoutuser');

//get
// Route::get('change', [AuthController::class, 'signOutUser']);

//forgate password
Route::get('ubah-password', [AuthController::class, 'forgate'])->name('ubah-password');//1

//profil
Route::get('profile', [AuthController::class, 'profileadmin'])->name('profile');
Route::get('edit', [AuthController::class, 'profileedit'])->name('edit');
Route::put('profileedit/{user}', [AuthController::class, 'update'])->name('profileedit');
Route::get('profileuser', [AuthController::class, 'profileuser'])->name('profileuser');
Route::get('edituser', [AuthController::class, 'profileeditUser'])->name('edituser');
Route::put('profileeditUser/{user}', [AuthController::class, 'updateUser'])->name('profileeditUser');

// owner/admin
Route::resource('owner', OwnerController::class);
Route::get('user/{user}/edit', [OwnerController::class, 'edit'])->name('owner.edit');

Route::resource('lapangan', LapanganFutsal::class);
Route::get('dashboard', [LapanganFutsal::class, 'dashboard'])->middleware('checkRole:admin,super-admin');
Route::resource('typelapangan', TypeLapanganController::class);
Route::resource('day', DaysController::class);
Route::resource('hour', hoursController::class);
Route::resource('price', PricesController::class);
Route::get('price/{price}/edit', [PricesController::class, 'edit'])->name('price.edit');

//detail order admin
route::resource('orderdetail', OrderDetailController::class);

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

Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
