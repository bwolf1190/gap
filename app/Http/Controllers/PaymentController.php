<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Stripe\{Stripe, Charge, Customer};

class PaymentController extends Controller
{
    //
    public function store(Request $request){
              Stripe::setApiKey(config("services.stripe.secret"));
              $cc = \App\Models\Customer::find($request['customer']);
              $plan = \App\Models\Plan::find($request['planId']);
              $enrollment = \App\Models\Enrollment::where('customer_id', $cc->id)->first();
              $p2c = \App\Models\EnrollmentP2C::where('customer_id', $cc->id)->first();

              $customer = Customer::create([
                'email' => request('email'),
                'source' => request('stripeToken')
              ]);

              try{
                $charge = Charge::create([
                  'customer' => $customer->id,
                  'amount' => request('amount'),
                  'currency' => 'usd'
                ]);
              } 
              catch (\Stripe\Error\ApiConnection $e) {
                    //dd( '1 ' . $e);
                    return view('errors.stripe-error');
              } 
              catch (\Stripe\Error\InvalidRequest $e) {
                    //dd('2 ' . $e);
                    return view('errors.stripe-error');
              } 
              catch (\Stripe\Error\Api $e) {
                    //dd('3 ' . $e);
                    return view('errors.stripe-error');
              } 
              catch (\Stripe\Error\Card $e) {
                    //dd('4 ' . $e);
                    return view('errors.stripe-error');
              }

              $cc->status = 'CONFIRMED';
              $cc->save();
              $enrollment->status = 'CONFIRMED';
              $enrollment->save();
              $p2c->status = 'CONFIRMED';
              $p2c->save();
              
              $c = $charge['amount'];
              $amount = substr_replace($c, '.', -2, 0);

              //return 'Customer charged for $' . $amount . ' sign up fee.';
              return view('stripe.summary')->with('customer', $cc)->with('plan', $plan)->with('amount', $amount);
    }
}
