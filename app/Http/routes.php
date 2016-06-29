<?php

Route::get('/', function () {
    return view('welcome');
});


/* <----------------------- Admin Routes -------------------------------->  */
Route::get('/admin', 'HomeController@index');

Route::get('/phpinfo', function(){
    return view('php-info');
});

Route::auth();

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/* <--------------------------------------------------------------------->  */



Route::get('/', array('as' => 'home', 'uses' => 'WelcomeController@index'));

Route::get('/enroll-greatamericanpower-sign-up-electricity', 'EnrollmentController@start');

Route::post('search', array('as' => 'search', 'uses'=>'LdcController@search'));

Route::get('/plans/{s}/{l}/{promo?}', array('as' => 'searchPlans', 'uses'=>'PlanController@searchPlans'));

Route::get('/customers/start/{id}/{promo?}', array('as' => 'start', 'uses'=>'CustomerController@start'));

Route::get('/enrollments/addEnrollment/{id}', array('as' => 'addEnrollment', 'uses'=>'EnrollmentController@addEnrollment'));

Route::get('/emails/welcome/{customer}', array('as' => 'welcome', 'uses'=>'EmailController@sendWelcome'));

Route::get('/emails/confirmation/{customer}/{confirmation_code}', array('as' => 'confirmation', 'uses'=>'EmailController@confirmEmail'));

// Broker routes
Route::get('/broker/{promo}', 'EnrollmentController@startBroker');
Route::post('getLdcs', array('as' => 'search', 'uses'=>'LdcController@brokerLdcs'));



/* <----------------------- Broker Routes ------------------------------->  */
Route::resource('brokers', 'BrokerController');

Route::get('brokers/{id}/delete', [
    'as' => 'brokers.delete',
    'uses' => 'BrokerController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <----------------------- Contact Routes ------------------------------>  */
Route::resource('contacts', 'ContactController');

Route::get('/contact-us-customer-service', 'ContactController@create');

Route::get('contacts/{id}/delete', [
    'as' => 'contacts.delete',
    'uses' => 'ContactController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <----------------------- Customer Routes	----------------------------->  */
Route::resource('customers', 'CustomerController');

Route::get('customers/{id}/delete', [
    'as' => 'customers.delete',
    'uses' => 'CustomerController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <----------------------- Enrollment Routes --------------------------->  */
Route::resource('enrollments', 'EnrollmentController');

Route::get('enrollments/{id}/delete', [
    'as' => 'enrollments.delete',
    'uses' => 'EnrollmentController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <----------------------- Faq Routes ---------------------------------->  */
Route::resource('faqs', 'FaqController');

Route::get('/frequently-asked-questions-energy-faq', 'FaqController@index');

Route::get('faqs/{id}/delete', [
    'as' => 'faqs.delete',
    'uses' => 'FaqController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <----------------------- Plan Routes ---------------------------------> */
Route::resource('plans', 'PlanController');

Route::get('plans/{id}/delete', [
    'as' => 'plans.delete',
    'uses' => 'PlanController@destroy',
]);
/* <--------------------------------------------------------------------->  */