<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    // dd()
    return view('index');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/settings', function () {
    return view('settings');
});
Route::get('/login', function () {
    // dd()
    return view('login');
});
Route::post('/settings', [RegisterController::class, 'update'])->name('settings');
Route::post('/uppassword', [RegisterController::class, 'uppassword']);

Route::post('/', [RegisterController::class, 'login']);
Route::post('/register', [RegisterController::class, 'addPerson']);
Route::get('/add', function () {
    return view('addProduct');
});
Route::get('/add', [ProductController::class, 'showCategories']);
Route::post('/add', [ProductController::class, 'addProduct']);
Route::get('/all', [ProductController::class, 'showAllProducts']);