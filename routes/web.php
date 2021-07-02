<?php
use App\Http\Controllers\SiteController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('site')->name('web.')->group(function(){
    Route::get('/home',[SiteController::class,'index'])->name('home');
    Route::get('/about-us',[SiteController::class,'about'])->name('about');
});
Route::get('/post/{id}/{name?}',[SiteController::class,'post']);    

// Route::group(['prefix' => 'fronend'],function(){
//     Route::get('/home',[SiteController::class,'index'])->name('home');
//     Route::get('/about',[SiteController::class,'about'])->name('about');
// });
// Route::prefix('test')->group(function(){
//     Route::get('/home',[SiteController::class,'index'])->name('home');
//     Route::get('/about',[SiteController::class,'about'])->name('about');
// });