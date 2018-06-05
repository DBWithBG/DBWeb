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

Route::get('/', 'CustomerController@home');


/******* LOGIN FB GOOGLE TWITTER **************/
Route::get('{provider}', 'Auth\SocialController@redirect')->where('provider', '(facebook|twitter|google)');
Route::get('{provider}/callback', 'Auth\SocialController@callback')->where('provider', '(facebook|twitter|google)');

Auth::routes();
/************* FIN LOGIN ***************/



Route::get('/old_home', 'HomeController@index')->name('old_home');

/******************* BACKOFFICE ADMIN ***********************************/

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

Route::get('backoffice/departments', 'AdminController@getDepartments');
Route::post('backoffice/addDepartment', 'AdminController@addDepartment');
Route::post('backoffice/deleteDepartment', 'AdminController@deleteDepartment');

/******************* FIN BACKOFFICE ADMIN****************************************/

/******************* BACKOFFICE DRIVER *************************************/

Route::get('drivers/register', 'DriverController@getRegister');

Route::get('driver/home', 'DriverController@home');

Route::get('driver/courses', 'DriverController@deliveries');

/******************* FIN BACKOFFICE DRIVER****************************************/


/*************************** FRONT CUSTOMER **************************************/

Route::get('/home', 'CustomerController@home');
Route::get('inscription', 'CustomerController@inscription');

Route::post('inscription', 'CustomerController@postInscription');

Route::get('connexion', 'CustomerController@connexion');

/************************** END FRONT CUSTOMER **********************************/


/************************** API MOBILE *******************************/
Route::get('/deliveries/{id}', 'HomeController@getDelivery');
Route::get('/deliveries', 'HomeController@getDeliveries');

Route::get('/customers/{id}', 'HomeController@getCustomer');
Route::get('/customers', 'HomeController@getCustomers');

Route::get('/drivers/{id}', 'HomeController@getDriver');
Route::get('/drivers', 'HomeController@getDrivers');

Route::post('/test/delivery', 'DeliveryController@postDelivery');

Route::get('/departments/authorized', 'HomeController@getAuthorizedDepartments');



Route::get('/test', 'phone\NotificationController@notify');
