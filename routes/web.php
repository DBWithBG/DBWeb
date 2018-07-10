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
Route::get('backoffice/customer/{id}', 'AdminController@getCustomer');
Route::post('backoffice/customer/{id}/update', 'AdminController@updateCustomer');
Route::post('backoffice/customer/delete', 'AdminController@deleteCustomer');

Route::get('backoffice/drivers', 'AdminController@getDrivers');
Route::get('backoffice/driver/{id}', 'AdminController@getDriver');
Route::post('backoffice/driver/{id}/update', 'AdminController@updateDriver');
Route::post('backoffice/driver/{id}/validate', 'AdminController@validateDriver');
Route::post('backoffice/driver/{id}/revoke', 'AdminController@revokeDriver');
Route::post('backoffice/driver/{idDriver}/validateJustificatif/{idJustificatif}', 'AdminController@validateDriverJustificatif');
Route::post('backoffice/driver/{idDriver}/revokeJustificatif/{idJustificatif}', 'AdminController@revokeDriverJustificatif');
Route::post('backoffice/driver/delete', 'AdminController@deleteDriver');

Route::get('backoffice/deliveries/inProgress', 'AdminController@getDeliveriesInProgress');
Route::get('backoffice/deliveries/past', 'AdminController@getDeliveriesPast');
Route::get('backoffice/deliveries/upComing', 'AdminController@getDeliveriesUpComing');
Route::post('backoffice/deliveries/delete', 'AdminController@deleteDeliveries');

Route::get('backoffice/disputes_ouvertes', 'AdminController@getDisputesOuvertes');
Route::get('backoffice/disputes_fermees', 'AdminController@getDisputesFermees');
Route::post('backoffice/dispute/delete', 'AdminController@deleteDispute');
Route::get('backoffice/dispute/{id}', 'AdminController@dispute');
Route::post('backoffice/dispute/{id}/update', 'AdminController@update');

//Departments
Route::get('backoffice/configuration/departments', 'AdminController@getDepartments');
Route::post('backoffice/configuration/addDepartment', 'AdminController@addDepartment');
Route::post('backoffice/configuration/deleteDepartment', 'AdminController@deleteDepartment');

//Bags
Route::get('backoffice/configuration/typeBagages', 'AdminController@getTypeBagages');
Route::post('backoffice/configuration/addTypeBagages', 'AdminController@addTypeBagages');
Route::post('/backoffice/configuration/deleteTypeBagages','AdminController@deleteTypeBagage');


/******************* FIN BACKOFFICE ADMIN****************************************/

/******************* BACKOFFICE DRIVER *************************************/

Route::get('drivers/register', 'DriverController@getRegister');
Route::get('drivers/login', 'DriverController@login');

Route::get('driver/home', 'DriverController@home');
Route::get('driver/resendConfirmationEmail', 'DriverController@resendConfirmationEmail');
Route::post('driver/update', 'DriverController@update');

Route::get('driver/viewJustificatif/{id}', 'DriverController@viewJustificatif');
Route::post('driver/addJustificatif', 'DriverController@addJustificatif');
Route::post('driver/deleteJustificatif/{id}', 'DriverController@deleteJustificatif');

Route::get('driver/courses', 'DriverController@deliveries');

Route::get('/driver/litiges/{id}', 'DriverController@litiges');
Route::post('/driver/newLitige/{id}', 'DriverController@newLitige');

Route::get('driver/confirmEmail', 'DriverController@confirmEmail');


/******************* FIN BACKOFFICE DRIVER****************************************/


/*************************** FRONT CUSTOMER **************************************/

Route::get('/home', 'CustomerController@home');

Route::get('/contact', 'CustomerController@contact');
Route::post('/contact', 'CustomerController@postContact');

Route::get('/modificationEmail', 'CustomerController@modificationEmail');
Route::post('/updateEmail', 'CustomerController@updateEmail');

Route::get('/modificationMotDePasse', 'CustomerController@modificationMotDePasse');
Route::post('/updatePassword', 'CustomerController@updatePassword');

Route::get('/historique', 'CustomerController@historique');
Route::get('/bagages', 'CustomerController@bagages');
Route::post('/addBagage', 'CustomerController@addBagage');
Route::post('/deleteBagage/{id}', 'CustomerController@deleteBagage');

Route::post('/comment', 'CustomerController@comment');
Route::get('/modalComment/{id}', 'CustomerController@modalComment');
Route::get('/modalRating/{id}', 'CustomerController@modalRating');

Route::post('/rate', 'CustomerController@rate');
Route::get('/litiges/{id}', 'CustomerController@litiges');
Route::post('/litiges/{id}', 'CustomerController@newLitige');
Route::post('/closeLitige/{id}', 'CustomerController@closeLitige');

Route::get('/profil', 'CustomerController@profil');
Route::post('/profil', 'CustomerController@update');

Route::get('/confirmEmail', 'CustomerController@confirmEmail');
Route::get('/resendConfirmationEmail', 'CustomerController@resendConfirmationEmail');

Route::get('inscription', 'CustomerController@inscription');
Route::post('inscription', 'CustomerController@postInscription');
Route::get('connexion', 'CustomerController@connexion');

Route::post('ajax/departments', 'CustomerController@ajaxDepartments');

Route::post('create/delivery', 'DeliveryController@postDelivery');
Route::post('savebags/delivery', 'DeliveryController@postBagsWithDelivery');

Route::get('delivery/{id}/paiement', 'DeliveryController@getPaiement');


Route::get('delivery/{id}/save', 'DeliveryController@getSaveDelivery');
/************************** END FRONT CUSTOMER **********************************/


/************************** API MOBILE *******************************/

Route::get('/deliveries/{id}', 'phone\MobileController@getDelivery');
Route::get('/deliveries', 'phone\MobileController@getDeliveries');
Route::get('/mobile/deliveries/customers', 'phone\MobileController@getDeliveriesByCustomers');
Route::post('/mobile/drivers/deliveries/edit-status', 'phone\MobileController@editStatusDriver');
Route::put('/mobile/delivery/{id}/edit', 'phone\MobileController@modificationDelivery');

Route::post('/mobile/deliveries/ratings', 'phone\MobileController@ratingDelivery');
Route::post('/mobile/deliveries/disputes', 'phone\MobileController@disputeDelivery');

Route::get('/mobile/bags/customers/{id}', 'phone\MobileController@modificationDelivery');

//Route::get('customers/profile','HomeController@getProfile');
Route::get('/customers', 'phone\MobileController@getCustomers');
Route::get('/customers/{id}', 'phone\MobileController@getCustomer');

Route::get('/drivers/{id}', 'phone\MobileController@getDriver');
Route::get('/drivers', 'phone\MobileController@getDrivers');
Route::put('drivers/infobags/edit','phone\MobileController@modificationEtatDesLieux');

Route::get('mobile/user/{token}','phone\MobileController@getUser');
Route::get('mobile/bags/users/{token}','phone\MobileController@getBagsUsers');
Route::get('/mobile/deliveries/drivers','phone\MobileController@getDriversDeliveries');
Route::put('mobile/bags/users','phone\MobileController@editBagsUsers');
Route::get('mobile/deliveries/{id}','phone\MobileController@showDelivery');
Route::put('mobile/users/refreshNotifyToken','phone\MobileController@setNotifyToken');
Route::get('/departments/authorized', 'phone\MobileController@getAuthorizedDepartments');
Route::post('/mobile/deliveries/payment','phone\MobileController@payment');
Route::post('/mobile/customers/deliveries/cancelDelivery','phone\MobileController@annulationDelivery');


Route::post('mobile/login', 'phone\MobileController@mobileLogin');



Route::get('/test2', 'phone\NotificationController@notify');

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

Route::get('test', 'MailController@confirm_register_customer');