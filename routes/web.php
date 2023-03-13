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
Auth::routes();

Route::get('/', 'eccomerce\EccomerceController@index')->name('eccomerce.index');
Route::get('/book/{slug}', 'eccomerce\EccomerceController@show')->name('eccomerce.show');
Route::get('/books', 'eccomerce\EccomerceController@product')->name('eccomerce.product');
Route::get('/books/search', 'eccomerce\EccomerceController@search')->name('eccomerce.search');
Route::get('/category/{category}', 'eccomerce\EccomerceController@category')->name('eccomerce.category');
Route::get('/request', 'eccomerce\EccomerceController@request')->name('eccomerce.request');
Route::post('/request', 'eccomerce\EccomerceController@requestCreate')->name('eccomerce.request.create');
Route::get('/about', 'eccomerce\EccomerceController@about')->name('eccomerce.about');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin'] ], function() {
	Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');

	Route::resource('/user', 'UserController');
	Route::resource('/category', 'CategoryController')->except(['create', 'show']);
	Route::resource('/book', 'BookController');
	Route::resource('order', 'OrderController');
	Route::resource('book-request', 'BookRequestController');

	Route::get('/setting', 'StoreSettingController@index')->name('store.setting');
	Route::post('/setting', 'StoreSettingController@add')->name('store.setting.add');
	Route::patch('/setting/{id}', 'StoreSettingController@update')->name('store.setting.update');
});

Route::group(['middleware' => ['auth', 'checkRole:user'] ], function() {
	Route::get('/cart', 'eccomerce\CartController@index')->name('cart.index');
	Route::post('/cart', 'eccomerce\CartController@create')->name('cart.create');
	Route::patch('/cart', 'eccomerce\CartController@update')->name('cart.update');

	Route::get('/checkout', 'eccomerce\CartController@checkout')->name('cart.checkout');
	Route::post('/order', 'eccomerce\CartController@order')->name('cart.order');
	Route::get('/order-success', 'eccomerce\CartController@orderSuccess')->name('cart.order.success');

	Route::get('/user/profile', 'eccomerce\UserController@index')->name('user.profil');
	Route::patch('/user/{id}', 'eccomerce\UserController@update')->name('user.ubah');

	Route::get('/user/address', 'eccomerce\AddressController@index')->name('user.address');
	Route::post('/user/address', 'eccomerce\AddressController@store')->name('user.address.store');
	Route::get('/user/address/{id}/edit', 'eccomerce\AddressController@edit')->name('user.address.edit');
	Route::patch('/user/address/{id}', 'eccomerce\AddressController@update')->name('user.address.update');

	Route::get('/user/order', 'eccomerce\OrderController@index')->name('user.order');
	Route::get('/user/order/{id}', 'eccomerce\OrderController@show')->name('user.order.show');
	Route::post('/user/order-payment-confirmation', 'eccomerce\OrderController@paymentConfirmation')->name('order.payment.confirmation');
});
