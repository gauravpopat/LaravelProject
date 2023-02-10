<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MemberController;
use App\Models\Member;

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

// Route::get('/mainpage',function(){
//     return view('welcome');
// })->name('mainpage');


Route::get('/o2o', [IndexController::class, 'onetoone'])->name('onetoone')->middleware('guard');

Route::get('/o2m', [IndexController::class, 'onetomany'])->name('onetomany')->middleware('guard');

Route::get('/o2mbt', [IndexController::class, 'onetomanybelongsto'])->name('onetomanybelongsto');

Route::get('/latest', [IndexController::class, 'latestOrder'])->name('latestOrder');

Route::get('/maxprice',[IndexController::class,'maxPrice'])->name('maxPrice')->middleware('guard');

Route::get('/minprice',[IndexController::class,'minPrice'])->name('minPrice');

Route::get('/creator', [IndexController::class, 'getCreator'])->name('getCreator');

Route::get('/showsong/{id}', [IndexController::class, 'show_song'])->name('show_song');

Route::get('/showsinger/{id}', [IndexController::class, 'show_singer'])->name('show_singer');

Route::get('/creatormany', [IndexController::class, 'getCreatorHasManyThrow'])->name('getCreatorHasManyThrow');

Route::get('/postcomment/{id}', [IndexController::class, 'postcomment'])->name('postcomment');

Route::get('/videocomment/{id}', [IndexController::class, 'videocomment'])->name('videocomment');

Route::get('/mutator', [MemberController::class, 'index'])->name('Mutator');

Route::get('/accessor',[MemberController::class,'accessor'])->name('accessor');

Route::get('/index',[MemberController::class,'index'])->name('index')->middleware('guard');

Route::get('register',[IndexController::class,'index']);
Route::post('register',[IndexController::class,'register']);




// Route::get('/casting',[MemberController::class,'casting'])->name('casting');

// Route::get('/no-access',function(){
//     echo "Access Denied";
//     die;
// });

// Route::get('/login',function(){
//     session()->put('user_id',1);
//     return redirect('/');
// });

// Route::get('/logout', function () {
//     session()->put('user_id',null);
//     return redirect('/');
// });




// // Route::get('/form',[MemberController::class,'goToView']);

// Route::post('newpage',[MemberController::class,'newpage'])->middleware('guard');

// Route::get('/',function(){
//     return view('testform');
// });

