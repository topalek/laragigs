<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('listing', ListingController::class);
    Route::get('/listing/manage', [ListingController::class, 'manage'])->name('listing.manage');
});
