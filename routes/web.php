<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;

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

Route::get('/connexion', function () {
    return view('connexion');
});

Route::resource('products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index'])->name('products.listProducts');

Route::resource('users', UserController::class);

Route::resource('socialite', SocialiteController::class);

Route::get('/signup', function () {
    return view('signup');
});

// La page où on présente les liens de redirection vers les providers
Route::get("login-register", "SocialiteController@loginRegister");

// La redirection vers le provider
Route::get("redirect/{provider}", "SocialiteController@redirect")->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", "SocialiteController@callback")->name('socialite.callback');
