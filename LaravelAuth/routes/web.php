<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMarkdownMail;
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


Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');

Route::post('login',[AuthController::class,'login'])->name('login');


Route::get('register',[AuthController::class,'register_view'])->name('register')->middleware('guest');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('home',[AuthController::class,'home'])->name('home');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('verify_email/{email_verification_code}',[AuthController::class,'verify_email'])->name('verify_email');



//Reset Password
Route::get('resetPassword',[AuthController::class,'resetPassword'])->name('resetPassword');
Route::post('resetpwd',[AuthController::class,'resetpwd'])->name('resetpwd');
Route::get('reset_password/{reset_password_code}',[AuthController::class,'reset_password'])->name('reset_password');
Route::post('changemypassword',[AuthController::class,'changemypassword'])->name('changemypassword');

Route::get('goBack',[AuthController::class,'goBack'])->name('goBack');


// Route::get('/', function () {
//         dispatch(function (){
//             Mail::to('queuegaurav@gmail.com')->send(new SendMarkdownMail());
//         })->delay(now()->addSeconds(2));
// });