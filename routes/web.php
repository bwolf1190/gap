<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/phpinfo', function(){
    return view('phpinfo');
});

Route::get('/e', function(){
    return view('errors.stripe-error');
});

Route::get('/t', function(){
    $customer = \App\Models\Customer::find(3288);
    $plan = \App\Models\Plan::find(31);
    $c = $plan->entry_fee;
    $amount = substr_replace($c, '.', -2, 0);
    return view('stripe.summary')->with('customer', $customer)->with('plan', $plan)->with('amount', $amount);
});

Route::get('/m', function(){
    return view('no-service');
});

Route::get('/gapres', function(){
    $ldcs = \App\Models\Ldc::orderBy('ldc', 'asc')->get();
    $type = 'save';
    $service = 'Residential';
    $promo = 'GAP';
    return view('ldcs.findex')->with('type', $type)->with('service', $service)-> with('ldcs', $ldcs)->with('promo', $promo);
});

Route::get('/gapcom', function(){
    $ldcs = \App\Models\Ldc::orderBy('ldc', 'asc')->get();
    $type = 'save';
    $service = 'Commercial';
    $promo = 'GAP';
    return view('ldcs.findex')->with('type', $type)->with('service', $service)-> with('ldcs', $ldcs)->with('promo', $promo);
});

Route::get('/sign-up-fee', function(){
    return view('stripe.stripe');
});

Route::post('/payment', 'PaymentController@store');

Route::get('/opsolve/ldcs', array('as' => 'opsolve', 'uses' => 'LdcController@getLdc'));

Route::get('/searchByState/{zip}', array('as' => 'searchByState', 'uses' => 'LdcController@searchByState'));

Route::get('/welcome-email', function(){
    return view('emails.welcome');
});

Route::get('/', array('as' => 'home', 'uses' => 'WelcomeController@index'));

Route::get('/enroll-sign-up-energy-electricity/{type?}', 'EnrollmentController@start');

Route::get('/i/{type}', array('as' => 'internal-start', 'uses' => 'EnrollmentController@start'));

//Route::post('/search/{s?}', array('as' => 'search', 'uses'=>'LdcController@search'));
Route::post('/search/{s?}', array('as' => 'search', 'uses'=>'LdcController@getLdc'));

Route::get('/{type}/select-plan/{s}/{l}/{promo?}', array('as' => 'searchPlans', 'uses'=>'PlanController@searchPlans'));

Route::get('/{type}/select-plan/{s}/{l}/meter/{meter?}', array('as' => 'searchMeteredPlans', 'uses'=>'PlanController@searchMeteredPlans'));

Route::get('/{type}/customers/start/{id}/{promo?}', array('as' => 'start', 'uses'=>'CustomerController@start'));

Route::get('/{type}/add/{id}/{agent?}/{agent_code?}/{sub_agent_code?}', array('as' => 'addEnrollment', 'uses'=>'EnrollmentController@addEnrollment'));

Route::get('/emails/welcome/{customer}', array('as' => 'welcome', 'uses'=>'EmailController@sendWelcome'));

Route::post('/emails/welcome/sent', array('as' => 'fireWelcomeEmail', 'uses' => 'EmailController@fireWelcomeEmail'));
//Route::get('/emails/welcome/{customer}', array('as' => 'welcome', 'uses'=>'EmailController@sendWelcome'));

Route::get('/offers', function(){
    return view('offers.offers');
});

Route::get('/emails/confirmation/{customer}/{confirmation_code}', array('as' => 'confirmation', 'uses'=>'EmailController@confirmEmail'));


/* <----------------------- Admin Routes -------------------------------->  */

Route::get('/delete-jobs', function(){
    DB::delete('delete from jobs');
});

Route::get('/dashboard', 'AdminController@index');

Route::get('/admin', 'HomeController@index');

Route::get('/update-plans', array('as' => 'update-plans', 'uses' => 'PlanController@updatePlans'));

Route::post('/resendEmails', array('as' => 'resendEmails', 'uses' => 'AdminController@resendEmails'));

Route::get('/broker-enrollments/s/{sort?}', 'AdminController@showAll');

Route::get('/broker-enrollments/{broker}/{sort?}', 'AdminController@showBrokerEnrollments');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* <--------------------------------------------------------------------->  */


/* <--------------------- GAAP Routes ---------------------------->  */

Route::get('/gaap', array('as' => 'gaapHome', 'uses' => 'GaapController@index'));

Route::get('/gaap/customers', 'GaapController@showCustomers');

Route::get('/gaap/plans', 'GaapController@showPlans');

Route::get('/gaap/messages', 'GaapController@showMessages');

Route::post('/gaap/message', 'GaapController@submitMessage');

/* <--------------------------------------------------------------------->  */


/* <----------------------- Broker Routes ------------------------------->  */

Route::resource('brokers', 'BrokerController');

Route::get('broker/admin', 'BrokerController@enrollments');

Route::get('broker/plans/{broker}', 'BrokerController@plans');

Route::get('broker/subagents/{broker}', 'BrokerController@subAgents');

Route::get('broker/admin/enrollments/export/{broker}', 'BrokerController@exportEnrollments');

Route::get('broker/admin/plans/export/{broker}', 'BrokerController@exportPlans');

Route::get('broker/admin/subagents/export/{broker}', 'BrokerController@exportSubagents');

// standard broker route
Route::get('/broker/{promo}', 'EnrollmentController@startBroker');

// special route for greatamericanpower/ironpigs
Route::get('/ironpigs', function(){
    return view('enroll-ironpigs')->with('promo', 'IRONPIGS')->with('type', 'broker');
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


/* <---------------------- Historical Rates Route ----------------------->  */

Route::get('/historical-rates', function(){

    $ldcs = \App\Models\Ldc::all();
    return view('historical-rates')->with('ldcs', $ldcs);

});

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

Route::resource('subagents', 'SubAgentController');

Route::get('subagents/{id}/delete', [
    'as' => 'subagents.delete',
    'uses' => 'SubAgentController@destroy',
]);
