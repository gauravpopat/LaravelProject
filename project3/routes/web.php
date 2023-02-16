<?php

use App\Http\Controllers\FileStorageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/upload',function(){
    return view('uploadfile');
});
Route::post('/upload',[HomeController::class,'upload'])->name('upload');
Route::post('/filestorage',[FileStorageController::class,'filestorage'])->name('filestorage');

Route::get('/helper',function(){
    echo message("...");
});


Route::get('/fs',function(){
    // $storage = Storage::disk('local')->put('gaurav.txt', 'Contents');
    // return dd($storage);
    // echo asset('storage/gaurav.txt');
    // return Storage::download('public/1676543714myfile.png');
    // return $url = Storage::url('1676543714myfile.png');
    // $size = Storage::size('public/1676543714myfile.png');
    // return $size ." KB";
    // $time = Storage::lastModified('gaurav.txt');
    // return gmdate("Y-m-d\ H:i:s", $time);
    // $mime = Storage::mimeType('gaurav.php');
    // return $mime; 
    // $path = Storage::path('gaurav.php'); //...storage/app.....
    // return $path;
    // Storage::prepend('gaurav.php', 'Prepended Text'); //at the first
    // Storage::append('gaurav.php', 'appended Text'); //at the end
});

