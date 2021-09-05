<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
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
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/settings', function () {
    return view('settings');
});
Route::post('/settings', [RegisterController::class, 'update']);
Route::post('/uppassword', [RegisterController::class, 'uppassword']);

Route::post('/', [RegisterController::class, 'login']);
Route::post('/register', [RegisterController::class, 'addPerson']);

Route::get('/add', [ProductController::class, 'showCategories']);
Route::post('/add', [ProductController::class, 'addProduct']);

// Route::get('/add', function () {
//     return view('addProduct');
// });