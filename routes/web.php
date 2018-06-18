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

Route::post('ajax/departments', 'CustomerController@ajaxDepartments');

Route::post('create/delivery', 'DeliveryController@postDelivery');

Route::get('delivery/{id}/paiement', 'DeliveryController@getPaiement');

/************************** END FRONT CUSTOMER **********************************/


/************************** API MOBILE *******************************/

Route::get('/deliveries/{id}', 'phone\MobileController@getDelivery');
Route::get('/deliveries', 'phone\MobileController@getDeliveries');
Route::post('/mobile/deliveries/customers', 'phone\MobileController@getDeliveriesByCustomers');
Route::post('/mobile/deliveries/takeovers/start', 'phone\MobileController@priseEnChargeDelivery');
Route::put('/mobile/delivery/{id}/edit', 'phone\MobileController@modificationDelivery');

Route::get('/customers/{id}', 'phone\MobileController@getCustomer');
Route::get('/customers', 'phone\MobileController@getCustomers');

Route::get('/drivers/{id}', 'phone\MobileController@getDriver');
Route::get('/drivers', 'phone\MobileController@getDrivers');

Route::post('/test/delivery', 'phone\MobileController@postDelivery');

Route::get('/departments/authorized', 'phone\MobileController@getAuthorizedDepartments');


Route::post('mobile/login', 'phone\MobileController@mobileLogin');



Route::get('/test', 'phone\NotificationController@notify');

/***************************** FIN API MOBILE **************************/

/******************************PAYBOX***************************************************/

Route::get('paybox/paiment_accepted','PayboxController@accepted')->name('paybox.accepted');
Route::get('paybox/paiment_refused','PayboxController@refused')->name('paybox.refused');
Route::get('paybox/paiment_waiting','PayboxController@waiting')->name('paybox.waiting');
Route::get('paybox/paiment_aborted','PayboxController@aborted')->name('paybox.aborted');
Route::get('paybox/paiment_process','PayboxController@process')->name('paybox.process');

//affichage utilisateur
Route::get('paybox/confirmation/','PayboxController@confirmation_paiement_paybox');
Route::get('paybox/attente/','PayboxController@attente_paiement_paybox');
Route::get('paybox/abandon','PayboxController@annule_paiement_paybox');
Route::get('paybox/refus/','PayboxController@refus_paybox');

/***************************** FIN PAYBOX ************************************/
