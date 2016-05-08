<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::get('/login', 'UserController@index');


Route::get('user/login', 'Auth\AuthController@getLogin');
Route::post('user/login', 'Auth\AuthController@postLogin');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'UserController@home');
    Route::get('/user/client_home', 'UserController@client_home');
    Route::get('/user/admin_home', 'UserController@admin_home');

    Route::resource('book', 'BookController');
    Route::any('/book/get_rack_books', 'BookController@get_rack_books');
    Route::any('/book/search_books', 'BookController@search_books');

    Route::resource('rack', 'RackController');

    Route::get('/user/logout', 'Auth\AuthController@getLogout');
});
