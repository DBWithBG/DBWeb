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

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/******************* BACKOFFICE ***********************************/

Route::get('backoffice/login', 'AdminController@login');

Route::get('backoffice/password', 'AdminController@getForgotPassword');

Route::post('backoffice/password-send', 'MailController@sendPassword');

Route::get('backoffice/home', 'AdminController@home');

Route::get('backoffice/customers', 'AdminController@getCustomers');
Route::post('backoffice/customer/delete', 'AdminController@deleteCustomer');

Route::get('backoffice/drivers', 'AdminController@getDrivers');
Route::post('backoffice/driver/delete', 'AdminController@deleteDriver');

Route::get('backoffice/deliveries/inProgress', 'AdminController@getDeliveriesInProgress');
Route::get('backoffice/deliveries/past', 'AdminController@getDeliveriesPast');
Route::get('backoffice/deliveries/upcoming', 'AdminController@getDeliveriesUpComing');
Route::post('backoffice/deliveries/delete', 'AdminController@deleteDeliveries');

Route::get('backoffice/disputes', 'AdminController@getDisputes');
Route::post('backoffice/dispute/delete', 'AdminController@deleteDispute');

/******************* FIN BACKOFFICE ****************************************/



/************************** API MOBILE *******************************/
Route::get('/deliveries/{id}', 'HomeController@getDelivery');
Route::get('/deliveries', 'HomeController@getDeliveries');

Route::get('/customers/{id}', 'HomeController@getCustomer');
Route::get('/customers', 'HomeController@getCustomers');

Route::get('/drivers/{id}', 'HomeController@getDriver');
Route::get('/drivers', 'HomeController@getDrivers');



Route::get('/test', 'phone\NotificationController@notify');
