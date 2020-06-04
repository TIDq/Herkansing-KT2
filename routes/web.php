<?php

Auth::routes();

Route::get('/', 'PageController@home');
Route::resource('carts', 'CartController');
Route::resource('cursus', 'CursusController');
Route::resource('uitvoering', 'UitvoeringController');
Route::resource('factuur', 'FactuurController');

Route::get('cart', 'UitvoeringController@showCart');
Route::get('cart/{id}/add', 'UitvoeringController@addToCart');
Route::get('cart/{index}/remove', 'UitvoeringController@removeFromCart');
Route::get('cart/empty', 'UitvoeringController@emptyCart');
Route::get('checkout', 'UitvoeringController@checkout');

Route::get('factuur/{id}/show', 'FactuurController@index');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
Route::resource('/users', 'UsersController', ['except'=>'show', 'create', 'store']);

});
