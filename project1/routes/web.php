<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

// Route::middleware('throttle:5,1')->get('/insert', [MyController::class, 'index']);

Route::get('/insert', [CustomerController::class,'index']);
Route::post('/store', [CustomerController::class,'store']);
Route::post('/addProduct', [CustomerController::class,'addProduct']);
Route::get('/view', [CustomerController::class,'view']);
Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('delete');
Route::get('/update/{id}', [CustomerController::class, 'update'])->name('update');
Route::post('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
Route::get('/forcedelete/{id}', [CustomerController::class, 'forcedelete'])->name('forcedelete');
Route::get('/restoredata', [CustomerController::class,'restoredata'])->name('restoredata');
Route::get('/restore/{id}',[CustomerController::class,'restore'])->name('restore');
Route::get('/restoreAll',[CustomerController::class,'restoreAll'])->name('restoreAll');
Route::get('/forceAll',[CustomerController::class,'forceAll'])->name('forceAll');
Route::get('/deleteAll', [CustomerController::class, 'deleteAll'])->name('deleteAll');
Route::get('/show', [CustomerController::class, 'show'])->name('show');
Route::get('/relation', [CustomerController::class, 'relation'])->name('relation');
// fallback
