<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConnexionController;


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

Route::get('/rgpd', function () {
    return view('rgpd');
});
Route::get('/signup', function () {
    return view('signup');
});

// routes vers controllers

Route::get('/connexion', [ConnexionController::class, 'showLoginForm'])->name('login');
Route::post('/connexion', [ConnexionController::class, 'login']);


Route::resource('products', ProductController::class);

Route::resource('users', UserController::class);


