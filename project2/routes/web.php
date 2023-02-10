<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MemberController;


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


Route::get('/o2o', [IndexController::class, 'onetoone'])->name('onetoone');

Route::get('/o2m', [IndexController::class, 'onetomany'])->name('onetomany');

Route::get('/o2mbt', [IndexController::class, 'onetomanybelongsto'])->name('onetomanybelongsto');

Route::get('/latest', [IndexController::class, 'latestOrder'])->name('latestOrder');

Route::get('/maxprice',[IndexController::class,'maxPrice'])->name('maxPrice');

Route::get('/minprice',[IndexController::class,'minPrice'])->name('minPrice');

Route::get('/creator', [IndexController::class, 'getCreator'])->name('getCreator');

Route::get('/showsong/{id}', [IndexController::class, 'show_song'])->name('show_song');

Route::get('/showsinger/{id}', [IndexController::class, 'show_singer'])->name('show_singer');

Route::get('/creatormany', [IndexController::class, 'getCreatorHasManyThrow'])->name('getCreatorHasManyThrow');

Route::get('/postcomment/{id}', [IndexController::class, 'postcomment'])->name('postcomment');

Route::get('/videocomment/{id}', [IndexController::class, 'videocomment'])->name('videocomment');

Route::get('/mutator', [MemberController::class, 'index'])->name('Mutator');

Route::get('/accessor',[MemberController::class,'accessor'])->name('accessor');

Route::get('/index',[MemberController::class,'index'])->name('index');
// Route::get('/casting',[MemberController::class,'casting'])->name('casting');