<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ForgetPassController;
use Illuminate\Support\Facades\Redirect;

Route::name('user.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
     
    Route::get('/register',  [HomeController::class, 'showRegister'])->name('showRegister');
    Route::get('/settings', function () {
        return view('settings');
    }) ->middleware('auth');

    Route::get('/forgetpass', [HomeController::class, 'forgetpassPage'])->name('forgetpass');
    Route::post('/settings', [RegisterController::class, 'update'])->name('settings');
    Route::post('/uppassword', [RegisterController::class, 'uppassword']);
    
    Route::post('/', [RegisterController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'addPerson']);
    Route::get('/add', [ProductController::class, 'showCategories'])->middleware('auth');
    Route::post('/add', [ProductController::class, 'addProduct']);
    Route::get('/all', [ProductController::class, 'showAllProducts'])->middleware('auth');
    Route::post('/all', [ProductController::class, 'ajax']);
    
    Route::get('/details/{id}', [ProductController::class, 'details'])->middleware('auth');
    Route::post('/search', [ProductController::class, 'headerSearch']);
    Route::post('/update', [ProductController::class, 'updateProduct']);
    Route::get('/shoping-cart', [CartController::class, 'cart'])->middleware('auth');
    Route::post('/shoping-cart', [CartController::class, 'ajax'])->middleware('auth');
    
    Route::get('/wishlist', [CartController::class, 'wishlist'])->middleware('auth');
    Route::post('/wishlist', [CartController::class, 'ajax'])->middleware('auth');
    
    Route::get('/orders/{id}', [OrderController::class, 'orders'])->middleware('auth');
    Route::post('/orders', [OrderController::class, 'feedback']);
   Route::post('/logout', [RegisterController::class, 'logout']);
 
});
Route::get('/login', [HomeController::class, 'loginpage'])->name('login');
Route::post('/send', [ForgetPassController::class, 'ajax']);
Route::post('/updatepassword', [ForgetPassController::class, 'createNewPass']);
View::composer('layouts.header', function ($view) {
    $auth =new Auth;
    $view->with('Auth', $auth->check());
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin')->middleware('auth');
    
    Route::get('/admin{any}', function () {
        return Redirect('admin');
    })->where('any',".*")->middleware('auth');
});

