<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InvitedUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;

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

Route::resource('orders', OrderController::class);
Route::resource('ordersProduct', OrderProductController::class);
Route::get('/orders/create/{productId}', [OrderController::class, 'create'])->name('orders.create');

/**Routage pour les rôles admin et user */
//Si on est connecté en tant qu'admin on a acces a la page /admin/dashboard
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index']);
});

//Si on est user on a acces a la page user/profil

Route::middleware(['role:user'])->group(function () {
    Route::get('/user/profile', [InvitedUserController::class, 'index']);

});

Route::get('/logout', [ConnexionController::class, 'logout'])->name('logout');
