<?php
use App\Http\Controllers\Fronend\SiteController;
use App\Http\Controllers\Fronend\SearchController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/',[SiteController::class, 'index'])->name('home');
Route::get('/{id}',[SiteController::class, 'cat_post'])->name('category.post');
Route::get('single-post/{post:slug}',[SiteController::class, 'single'])->name('single.post');

Route::prefix('site')->name('user.')->group(function(){
    Route::get('/register',[SiteController::class, 'registationForm'])->name('registationForm');
    Route::post('/user/register',[SiteController::class, 'registation'])->name('registation');
    Route::get('/admin',[SiteController::class, 'loginForm'])->name('loginForm');
    Route::post('/user/login',[SiteController::class, 'login'])->name('login');
    Route::get('/user/logout',[SiteController::class, 'logout'])->name('logout');

});

//dashboard
Route::group(['middleware'=>'admin_auth'],function(){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::get('dashboard',[DashBoardController::class, 'index'])->name('dashboard');
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/',[CategoryController::class, 'index'])->name('index');
            Route::get('create',[CategoryController::class, 'create'])->name('create');
            Route::post('save',[CategoryController::class, 'store'])->name('save');
            Route::post('update',[CategoryController::class, 'update'])->name('update');
            Route::get('/{id}',[CategoryController::class, 'show'])->name('show');
            Route::get('/{id}/edit',[CategoryController::class, 'edit'])->name('edit');
            Route::put('/{id}/update',[CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}',[CategoryController::class, 'destroy'])->name('delete');
        });

        Route::prefix('post')->name('post.')->group(function(){
            Route::get('/',[PostController::class, 'index'])->name('index');
            Route::get('create',[PostController::class, 'create'])->name('create');
            Route::post('save',[PostController::class, 'store'])->name('save');
            Route::post('update',[PostController::class, 'update'])->name('update');
            Route::get('/{id}',[PostController::class, 'show'])->name('show');
            Route::get('/{id}/edit',[PostController::class, 'edit'])->name('edit');
            Route::put('/{id}/update',[PostController::class, 'update'])->name('update');
            Route::delete('/{id}',[PostController::class, 'destroy'])->name('delete');
        });
    });

});

//search 
Route::post('post/search',[SearchController::class, 'search'])->name('post.search');
Route::get('/search/ajax',[SearchController::class, 'liveSearch'])->name('live.search');
//Route::resource('post',PostController::class);


