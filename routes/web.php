<?php

Auth::routes();

Route::get('/', 'PageController@home');
Route::resource('carts', 'CartController');
Route::resource('cursus', 'CursusController');
Route::resource('uitvoering', 'UitvoeringController');
Route::resource('factuur', 'FactuurController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
Route::resource('/users', 'UsersController', ['except'=>'show', 'create', 'store']);

});
