<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/data/{id?}',[HomeController::class,'getData'])->middleware('auth:sanctum');
Route::post('/register',[HomeController::class,'register'])->name('register');
//Route::post('/login',[HomeController::class,'login'])->name('login');
Route::put('/update/{id?}',[HomeController::class,'update'])->name('update');
Route::get('/search/{name?}',[HomeController::class,'search'])->name('search');
Route::delete('/delete/{id?}',[HomeController::class,'delete'])->name('delete');

Route::post('/auth/register',[AuthController::class,'createUser']);
Route::post('/auth/login',[AuthController::class,'login']);

Route::post('/auth/upload',[AuthController::class,'upload']);
