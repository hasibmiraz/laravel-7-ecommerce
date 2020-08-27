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
Route::post('/updateqty/{id}', 'ClientController@updateqty')->name('update.qty');
Route::get('/removeitem/{id}', 'ClientController@removeitem')->name('remove.item');
Route::get('/product/checkout', 'ClientController@postcheckout')->name('product.checkout');

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('/orders', 'AdminController@orders')->name('orders.show');

Route::get('/products', 'ProductController@products')->name('products.show');
Route::get('/addproduct', 'ProductController@addproduct')->name('product.create');
Route::post('/saveproduct', 'ProductController@saveproduct')->name('product.store');
Route::get('/product/edit/{id}', 'ProductController@editproduct')->name('product.edit');
Route::post('/product/update/{id}', 'ProductController@updateproduct')->name('product.update');
Route::get('/product/delete/{id}', 'ProductController@deleteproduct')->name('product.delete');
Route::get('/product/activate/{id}', 'ProductController@activateproduct')->name('product.activate');
Route::get('/product/cart/{id}', 'ProductController@addToCart')->name('product.cart');

Route::get('/categories', 'CategoryController@categories')->name('categories.show');
Route::get('/addcategory', 'CategoryController@addcategory')->name('category.create');
Route::post('/savecategory', 'CategoryController@savecategory')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@editcategory')->name('category.edit');
Route::post('/category/update/{id}', 'CategoryController@updatecategory')->name('category.update');
Route::get('/category/delete/{id}', 'CategoryController@deletecategory')->name('category.delete');
Route::get('/category/{name}', 'CategoryController@cateview')->name('category.view');

Route::get('/sliders', 'SliderController@sliders')->name('sliders.show');
Route::get('/addslider', 'SliderController@addslider')->name('slider.create');
Route::post('/save/slider', 'SliderController@saveslider')->name('slider.store');
Route::get('/edit/slider/{id}', 'SliderController@editslider')->name('slider.edit');
Route::post('/update/slider/{id}', 'SliderController@updateslider')->name('slider.update');
Route::get('/delete/slider/{id}', 'SliderController@deleteslider')->name('slider.delete');
Route::get('/slider/activate/{id}', 'SliderController@activateslider')->name('slider.activate');