<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register_view'])->name('register')->middleware('guest');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::get('home',[AuthController::class,'home'])->name('home')->middleware('noentry');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::get('sendMailForChangePassword',[AuthController::class,'sendMailForChangePassword'])->name('sendMailForChangePassword')->middleware('noentry');
Route::get('change_password',[AuthController::class,'change_password'])->name('change_password')->middleware('noentry');
Route::post('update_password',[AuthController::class,'update_password'])->name('update_password')->middleware('noentry');