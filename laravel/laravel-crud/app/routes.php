<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UserController@getIndex');
Route::get('home', 'UserController@getIndex');

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');

Route::get('profile', 'UserController@getProfile');
Route::post('profile', 'UserController@postProfile');

Route::get('logout', 'UserController@getLogout');

Route::get('delete', 'UserController@getDelete');