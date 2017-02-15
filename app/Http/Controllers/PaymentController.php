<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Stripe\{Stripe, Charge, Customer};

class PaymentController extends Controller
{
    //
    public function store(){
    	Stripe::setApiKey('sk_test_8iWdn9aDuIqP7qKjHf2FcbA4');
    	
    	$customer = Customer::create([
    		'email' => request('email'),
    		'source' => request('stripeToken')
    	]);

    	$charge = Charge::create([
    		'customer' => $customer->id,
    		'amount' => '2500',
    		'currency' => 'usd'
    	]);

    	return 'All Done';
    }
}
