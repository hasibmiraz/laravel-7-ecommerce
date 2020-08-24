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

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('/orders', 'AdminController@orders')->name('orders.show');

Route::get('/products', 'ProductController@products')->name('products.show');
Route::get('/addproduct', 'ProductController@addproduct')->name('product.create');
Route::post('/saveproduct', 'ProductController@saveproduct')->name('product.store');
Route::get('/product/edit/{id}', 'ProductController@editproduct')->name('product.edit');

Route::get('/categories', 'CategoryController@categories')->name('categories.show');
Route::get('/addcategory', 'CategoryController@addcategory')->name('category.create');
Route::post('/savecategory', 'CategoryController@savecategory')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@editcategory')->name('category.edit');
Route::post('/category/update/{id}', 'CategoryController@updatecategory')->name('category.update');
Route::get('/category/delete/{id}', 'CategoryController@deletecategory')->name('category.delete');

Route::get('/sliders', 'SliderController@sliders')->name('sliders.show');
Route::get('/addslider', 'SliderController@addslider')->name('slider.create');