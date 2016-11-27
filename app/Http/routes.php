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
Route::get('/dashboardEnforcer', 'dashboardEnforcerController@index');

Route::get('/dashboardCompany', 'dashboardCompanyController@index');
Route::get('/dashboardCompany/getTickets', 'dashboardCompanyController@getMunicipalityTickets');
Route::post('/dashboardCompany/payment', 'dashboardCompanyController@paymentInCompany');
Route::post('/dashboardCompany/claim', 'dashboardCompanyController@claimInCompany');

Route::get('/signup', 'SignUpController@index');
Route::post('/signup/store', 'DriverController@store');
Route::post('/driver/update', 'DriverController@updateDriver');
// Route::post('/signup/store', 'SignUpController@store');

Route::get('/ticketing', 'TicketController@index');
Route::post('/ticketing/create', 'TicketController@create');
Route::post('/ticket/store', 'TicketController@store');

Route::get('/summary', 'SummaryController@index');
Route::get('/test', 'TestController@index');

Route::get('/payment', 'PaymentController@index');
Route::post('/payment/add', 'PaymentController@transact');

Route::get('/driver', 'DriverController@getDriver');

Route::get('/user', 'LoginController@index');

Route::get('/report', 'ReportController@index');

Route::post('/driverlogin', 'LoginController@loginDriver');
Route::post('/enforcerlogin', 'LoginController@loginEnforcer');
Route::post('/companylogin', 'LoginController@loginCompany');

Route::get('logout/', 'LoginController@logout');
