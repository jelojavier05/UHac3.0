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

Route::get('/', 'LoginController@index');
Route::get('/signup', 'SignUpController@index');
Route::get('/profile', 'LogProfileController@index');
Route::get('/dashboard', 'DashboardController@index');

Route::get('/signup', 'SignUpController@index');
Route::post('/signup/store', 'DriverController@store');
Route::post('/driver/update', 'DriverController@updateDriver');
Route::post('/signup/store', 'SignUpController@store');

Route::get('/ticketing', 'TicketController@index');
Route::get('/test', 'TestController@index');
