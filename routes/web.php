<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
});
// ->middleware('auth')
Route::get('/register', function () {
    return view('register');
});
Route::get('/settings', function () {
    return view('settings');
}) ;
Route::get('/login', function () {
    return view('login');
});
Route::get('/forgetpass', function () {
    return view('forgetpass');
});
Route::post('/settings', [RegisterController::class, 'update'])->name('settings');
Route::post('/uppassword', [RegisterController::class, 'uppassword']);

Route::post('/', [RegisterController::class, 'login']);
Route::post('/register', [RegisterController::class, 'addPerson']);
Route::get('/add', [ProductController::class, 'showCategories']);
Route::post('/add', [ProductController::class, 'addProduct']);
Route::get('/all', [ProductController::class, 'showAllProducts']);
Route::post('/all', [ProductController::class, 'ajax']);

Route::get('/details/{id}', [ProductController::class, 'details']);
Route::post('/search', [ProductController::class, 'headerSearch']);
Route::post('/update', [ProductController::class, 'updateProduct']);
Route::get('/shoping-cart', [CartController::class, 'cart']);
Route::post('/shoping-cart', [CartController::class, 'ajax']);

Route::get('/wishlist', [CartController::class, 'wishlist']);
Route::post('/wishlist', [CartController::class, 'ajax']);

Route::get('/orders/{id}', [OrderController::class, 'orders']);
Route::post('/orders', [OrderController::class, 'feedback']);

Route::post('/logout', [RegisterController::class, 'logout']);

View::composer('inc.orders', function ($view) {
    $view->with('orders', OrderController::myOrders());
});

