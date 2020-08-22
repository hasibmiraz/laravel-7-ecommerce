<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ClientController@home')->name('home');
Route::get('/shop', 'ClientController@shop')->name('shop');
Route::get('/cart', 'ClientController@cart')->name('cart');
Route::get('/checkout', 'ClientController@checkout')->name('checkout');
Route::get('/login', 'ClientController@login')->name('login');
Route::get('/signup', 'ClientController@signup')->name('signup');
