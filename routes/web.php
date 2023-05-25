<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/helloworld', function () {
    return view('helloworld');
});

Route::get('/connexion', function () {
    return view('connexion');
});

Route::resource('products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index'])->name('products.listProducts');

Route::resource('user', UserController::class);

Route::get('/signup', function () {
    return view('signup');
});


