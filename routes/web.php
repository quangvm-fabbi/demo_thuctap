<?php

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

Route::group(['prefix' => 'admin' ], function () {
    Route::resource('user', 'admin\UserController');
    Route::resource('role', 'admin\RoleController');
    Route::resource('category', 'admin\CategoryController');
    Route::resource('cake', 'admin\CakeController');
    Route::resource('image', 'admin\ImageController');
    Route::resource('order', 'admin\OrderController');

});

Route::get('/', 'PagesController@getHome')->name('homepages');
Route::get('cake-detail/{id}', 'PagesController@getCakeDetail')->name('cakeDetail');
Route::get('cake-category/{id}', 'PagesController@getCakeByCategory')->name('cakeCategory');
Route::get('checkout', 'CheckoutController@getCheckout')->name('checkout');
Route::post('playOrder', 'CheckoutController@playOrder')->name('playOrder');
Route::get('thankYou', 'CheckoutController@thankYou')->name('thankYou');
Route::get('my-acount', 'PagesController@myAcount')->name('acount');
Route::get('all-cake', 'PagesController@allCake')->name('allcake');
Route::group(['as' => 'api.', 'prefix' => 'api'], function(){
    Route::get('/cart', 'CartController@getCart')->name('cart.getCart');
    Route::post('/cart', 'CartController@addToCart')->name('cart.addToCart');
});
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@updateCart')->name('cart.updateCart');
Route::get('/cart/{id}/delete', 'CartController@deleteCart')->name('cart.deleteCart');
Route::get('/cart/deleteAll', 'CartController@deleteAll')->name('cart.deleteAll');
Route::post('commentFood/{id}', 'CommentController@postCommentFood')->name('commentFood');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
