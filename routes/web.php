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

//Route::get('/', 'HomeController@maintenance');
Route::get('/', 'CustomerController@home');
Route::get('/home', 'CustomerController@home');

/******* LOGIN FB GOOGLE TWITTER **************/
Route::get('{provider}', 'Auth\SocialController@redirect')->where('provider', '(facebook|twitter|google)');
Route::get('{provider}/callback', 'Auth\SocialController@callback')->where('provider', '(facebook|twitter|google)');

// Authentication Routes...
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('/login', 'HomeController@maintenance');

// Registration Routes...
$this->post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
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
Route::get('backoffice/driver/{id}/facture/{year}/{month}', 'AdminController@getFactureDriver');
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
Route::get('backoffice/deliveries/{id}/endit', 'AdminController@endDelivery');

Route::get('backoffice/disputes_ouvertes', 'AdminController@getDisputesOuvertes');
Route::get('backoffice/disputes_traitement', 'AdminController@getDisputesTraitement');
Route::get('backoffice/disputes_fermees', 'AdminController@getDisputesFermees');
Route::post('backoffice/dispute/delete', 'AdminController@deleteDispute');
Route::get('backoffice/dispute/{id}', 'AdminController@dispute');
Route::post('backoffice/dispute/{id}/update', 'AdminController@update');

Route::post('/backoffice/configuration/addPrice/old', 'AdminController@oldPrice');
Route::get('/backoffice/configuration/addPrice/old', 'AdminController@getoldPrice');
//Prices
Route::get('backoffice/configuration/prices', 'AdminController@getPrice');
Route::post('backoffice/configuration/addPrice', 'AdminController@addPrice');
Route::post('backoffice/configuration/deletePrice', 'AdminController@deletePrice');

//Departments
Route::get('backoffice/configuration/departments', 'AdminController@getDepartments');
Route::post('backoffice/configuration/addDepartment', 'AdminController@addDepartment');
Route::post('backoffice/configuration/deleteDepartment', 'AdminController@deleteDepartment');

//Bags
Route::get('backoffice/configuration/typeBagages', 'AdminController@getTypeBagages');
Route::post('backoffice/configuration/addTypeBagages', 'AdminController@addTypeBagages');
Route::post('/backoffice/configuration/deleteTypeBagages','AdminController@deleteTypeBagage');


//Notifications
Route::get('backoffice/notifications', 'AdminController@getNotifications');
Route::post('/backoffice/push/notification', 'AdminController@postNotifications');

//Emails
Route::get('backoffice/emails', 'AdminController@getEmails');
Route::post('/backoffice/push/email', 'AdminController@postEmails');

//Historique des envois
Route::get('backoffice/envoi/historique', 'AdminController@getHistoriqueEnvoi');

//Partners
Route::get('backoffice/partners', 'AdminController@getPartners');
Route::post('/backoffice/addPartner', 'AdminController@addPartner');

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


//Route::get('/home', 'CustomerController@home');


Route::get('/regles', function() { return view('customer.regles');});
Route::get('/apropos', function() { return view('customer.apropos');});
Route::get('/aide', function() { return view('customer.aide');});
Route::get('/mentionslegales', function() { return view('customer.mentionslegales');});
Route::get('/confiance', function() { return view('customer.confiance');});
Route::get('/securite', function() { return view('customer.securite');});
Route::get('/accespro', function() { return view('customer.accespro');});
Route::get('/tgc', 'CustomerController@tgc'); // tgc = Termes générales et conditions

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
Route::get('bagages/{id}/edit', 'CustomerController@showEditBag');
Route::post('bagages/{id}/edit', 'CustomerController@editBagage');

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

Route::post('/mobile/deliveries/computePrice', 'phone\MobileController@computePrice');

//Facture
Route::get('delivery/{id}/getFacture', 'FactureController@genererFactureDelivery');
Route::get('delivery/{id}/showFacture', 'FactureController@getFacture');

Route::get('delivery/{id}/save', 'DeliveryController@getSaveDelivery');

Route::post('/delivery/paiement', 'DeliveryController@getPaiement');

Route::get('/delivery/end','DeliveryController@getPaiementStatus');

Route::get('delivery/paiement/success','DeliveryController@success');
Route::get('delivery/paiement/waiting','DeliveryController@waiting');
Route::get('delivery/paiement/aborted','DeliveryController@aborted');
Route::get('delivery/paiement/refused','DeliveryController@refused');
/************************** END FRONT CUSTOMER **********************************/


/************************** API MOBILE *******************************/


Route::get('mobile/checkLoginFacebook', 'Auth\SocialController@mobileCheckAccessToken');

Route::post('mobile/register', 'phone\APIRegisterController@register');
Route::post('mobile/login', 'phone\APILoginController@login');

Route::post('mobile/logout', 'phone\APILoginController@logout');

Route::post('mobile/deliveries', 'phone\MobileController@postDelivery');
Route::get('/deliveries/{id}', 'phone\MobileController@getDelivery');
Route::get('/deliveries', 'phone\MobileController@getDeliveries');
Route::get('/mobile/deliveries/customers', 'phone\MobileController@getDeliveriesByCustomers');
Route::post('/mobile/drivers/deliveries/edit-status', 'phone\MobileController@editStatusDriver');
Route::put('/mobile/delivery/{id}/edit', 'phone\MobileController@modificationDelivery');

Route::post('/mobile/deliveries/ratings', 'phone\MobileController@ratingDelivery');
Route::post('/mobile/deliveries/disputes', 'phone\MobileController@disputeDelivery');

Route::get('/mobile/bags/customers/{id}', 'phone\MobileController@modificationDelivery');

Route::get('/mobile/resend-confirmation-email', 'phone\MobileController@resendConfirmationEmail');

//Route::get('customers/profile','HomeController@getProfile');
Route::get('/customers', 'phone\MobileController@getCustomers');
Route::get('mobile/customer', 'phone\MobileController@getCustomer');
Route::put('mobile/customer', 'phone\MobileController@updateCustomer');

Route::put('mobile/password', 'phone\MobileController@updatePassword');

Route::put('mobile/email', 'phone\MobileController@updateEmail');

Route::get('mobile/driver/', 'phone\MobileController@getDriver');
Route::put('mobile/driver/', 'phone\MobileController@updateDriver');

Route::post('mobile/driver/addJustificatif', 'phone\MobileController@addJustificatif');
Route::delete('mobile/driver/justificatif/{id}', 'phone\MobileController@deleteJustificatif');
Route::get('mobile/driver/justificatif/{id}', 'phone\MobileController@getJustificatif');
Route::get('mobile/driver/facture/{year}/{month}', 'phone\MobileController@getFactureDriver');
Route::get('mobile/driver/justificatifs', 'phone\MobileController@getJustificatifs');
Route::put('mobile/driver/siret', 'phone\MobileController@updateSiretDriver');
Route::get('/drivers', 'phone\MobileController@getDrivers');
Route::put('/mobile/drivers/infobags/edit','phone\MobileController@modificationEtatDesLieux');

Route::get('mobile/user','phone\MobileController@getUser');
Route::get('mobile/bags/users','phone\MobileController@getBagsUsers');
Route::get('/mobile/deliveries-status/drivers','phone\MobileController@getDeliveriesByDriverByStatus');
Route::get('/mobile/deliveries/drivers','phone\MobileController@getDriversDeliveries');
Route::put('mobile/bags/users','phone\MobileController@editBagsUsers');
Route::get('mobile/deliveries/{id}','phone\MobileController@showDelivery');
Route::put('mobile/users/refreshNotifyToken','phone\MobileController@setNotifyToken');
Route::get('departments/authorized', 'phone\MobileController@getAuthorizedDepartments');
Route::post('/mobile/deliveries/payment','phone\MobileController@payment');
Route::post('/mobile/customers/deliveries/cancelDelivery','phone\MobileController@annulationDelivery');

Route::put('mobile/drivers/setPosition','phone\MobileController@setPosition');

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

Route::get('testpaybox', 'AdminController@testPaybox');


//mise en place langues
Route::name('language')->get('language/{lang}', 'HomeController@language');