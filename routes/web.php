<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LapanganFutsal;
use App\Http\Controllers\TypeLapanganController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\PricesController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('profile', [AuthController::class, 'profileadmin'])->name('profile');
Route::put('profileedit/{user}', [AuthController::class, 'update'])->name('profileedit');
Route::resource('lapangan', LapanganFutsal::class);
Route::get('dashboard', [LapanganFutsal::class, 'dashboard'])->middleware('checkRole:admin,super-admin');
Route::resource('typelapangan', TypeLapanganController::class);
Route::resource('day', DaysController::class);
Route::resource('hour', hoursController::class);
Route::resource('price', PricesController::class);