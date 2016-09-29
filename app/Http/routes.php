<?php

Route::get('/welcome-email', function(){
    return view('emails.welcome');
});

Route::get('/', array('as' => 'home', 'uses' => 'WelcomeController@index'));

Route::get('/enroll-sign-up-energy-electricity/{type?}', 'EnrollmentController@start');

Route::post('/search/{s?}', array('as' => 'search', 'uses'=>'LdcController@search'));

Route::get('/{type}/select-plan/{s}/{l}/{promo?}', array('as' => 'searchPlans', 'uses'=>'PlanController@searchPlans'));

Route::get('/{type}/customers/start/{id}/{promo?}', array('as' => 'start', 'uses'=>'CustomerController@start'));

Route::get('/{type}/add/{id}/{agent?}/{agent_code?}/{sub_agent_code?}', array('as' => 'addEnrollment', 'uses'=>'EnrollmentController@addEnrollment'));

Route::get('/emails/welcome/{customer}', array('as' => 'welcome', 'uses'=>'EmailController@sendWelcome'));

Route::get('/emails/confirmation/{customer}/{confirmation_code}', array('as' => 'confirmation', 'uses'=>'EmailController@confirmEmail'));


/* <----------------------- Admin Routes -------------------------------->  */
Route::get('/c', function(){
    return view('chartjs');
});

Route::get('/analytics', function(){
    return view('admin.analytics');
});

Route::get('/delete-jobs', function(){
    DB::delete('delete from jobs');
});

Route::get('/dashboard', 'AdminController@index');

Route::get('/admin', 'HomeController@index');

Route::get('/truncate', 'PlanController@truncate');

Route::get('/update-plans', array('as' => 'update-plans', 'uses' => 'PlanController@truncate'));

Route::post('/resendEmails', array('as' => 'resendEmails', 'uses' => 'AdminController@resendEmails'));

Route::get('/broker-enrollments/s/{sort?}', 'AdminController@showAll');

Route::get('/broker-enrollments/{broker}/{sort?}', 'AdminController@showBrokerEnrollments');

Route::get('/internalEnrollments', 'AdminController@internalEnrollments');

Route::auth();

Route::get('/internal', array('as' => 'internal-start', 'EnrollmentController@start'));

Route::get('/phpinfo', function(){
    return view('phpinfo');
});


/* <--------------------------------------------------------------------->  */


/* <----------------------- About Us Routes ----------------------------->  */
Route::get('/about-us', function(){
    return view('about-us');
});
/* <--------------------------------------------------------------------->  */

/* <----------------------- Broker Routes ------------------------------->  */
Route::resource('brokers', 'BrokerController');

Route::get('broker/admin', 'BrokerController@adminHome');

// standard broker route
Route::get('/broker/{promo}', 'EnrollmentController@startBroker');

// special route for greatamericanpower/ironpigs
Route::get('/ironpigs', function(){
    return view('enroll-broker')->with('promo', 'IRONPIGS')->with('type', 'broker');
});

Route::post('broker', array('as' => 'broker', 'uses'=>'LdcController@brokerLdcs'));


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

Route::get('sort-customers/{column}', 'CustomerController@sortCustomers');

Route::get('customers/{id}/delete', [
    'as' => 'customers.delete',
    'uses' => 'CustomerController@destroy',
]);
/* <--------------------------------------------------------------------->  */


/* <----------------------- Enrollment Routes --------------------------->  */
Route::resource('enrollments', 'EnrollmentController');

Route::get('sort-enrollments/{column}', 'EnrollmentController@sortEnrollments');

Route::get('enrollments/{id}/delete', [
    'as' => 'enrollments.delete',
    'uses' => 'EnrollmentController@destroy',
]);
/* <--------------------------------------------------------------------->  */


/* <----------------------- Faq Routes ---------------------------------->  */
Route::resource('faqs', 'FaqController');

Route::get('/faq-frequently-asked-questions-energy-electricity', 'FaqController@view');

Route::get('faqs/{id}/delete', [
    'as' => 'faqs.delete',
    'uses' => 'FaqController@destroy',
]);
/* <--------------------------------------------------------------------->  */

/* <------------------- Internal Enrollment Routes ---------------------->  */

/*
Route::resource('internalEnrollments', 'InternalEnrollmentController');

Route::get('/internal/sort-enrollments/{column}', 'InternalEnrollmentController@sortEnrollments');

Route::get('enrollments/{id}/delete', [
    'as' => 'enrollments.delete',
    'uses' => 'EnrollmentController@destroy',
]);
*/

/* <--------------------------------------------------------------------->  */

/* <----------------------- Plan Routes ---------------------------------> */
Route::resource('ldcs', 'LdcController');

//Route::get('sort-plans/{column}', 'PlanController@sortPlans');

Route::get('ldcs/{id}/delete', [
    'as' => 'ldcs.delete',
    'uses' => 'LdcController@destroy',
]);


/* <--------------------------------------------------------------------->  */

/* <----------------------- Plan Routes ---------------------------------> */
Route::resource('plans', 'PlanController');

Route::get('sort-plans/{column}', 'PlanController@sortPlans');

Route::get('plans/{id}/delete', [
    'as' => 'plans.delete',
    'uses' => 'PlanController@destroy',
]);


/* <--------------------------------------------------------------------->  */

