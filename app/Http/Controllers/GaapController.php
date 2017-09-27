<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Debugbar;
use Response;
use Session;
use Flash;
use Mail;
use DB;


class GaapController extends Controller
{

	public function __construct(){
		$this->middleware('admin');
	}

	public function index(){
		$agent = \Auth::user()->name;
		$messages = \App\Models\GaapMessage::orderBy('id', 'desc')->where('agent', $agent)->get();
		$total = count(\App\Models\Customer::where('promo', $agent)->get());
		$confirmed = (count(\App\Models\Customer::where('promo', $agent)->where('status', 'CONFIRMED')->get()) / $total) * 100;
		$unconfirmed = (count(\App\Models\Customer::where('promo', $agent)->where('status', 'PENDING')->get()) / $total) * 100;
    		
    		return view('gaap.index')->with('messages', $messages)->with('confirmed', $confirmed)->with('unconfirmed', $unconfirmed)->with('total', $total);
    	}

	public function showCustomers(){
		$agent = \Auth::user()->name;
		$customers = \App\Models\Customer::orderBy('id', 'desc')->where('promo', $agent)->get();

		return view('gaap.customers')->with('customers', $customers);
	}

	public function showPlans(){
		$agent = \Auth::user()->name;
		$plans = \App\Models\Plan::where('promo', $agent)->get();

		return view('gaap.plans')->with('plans', $plans);
	}

	public function showMessages(){
		$agent = \Auth::user()->name;
		$messages = \App\Models\GaapMessage::orderBy('id', 'desc')->where('agent', $agent)->get();

		return view('gaap.messages')->with('messages', $messages);
	}

	public function submitMessage(Request $request){
		$agent = \Auth::user()->name;
		$email = \Auth::user()->email;
		$message = $request->input('message');
		$created_at = date("Y-m-d H:i:s");
		$input = ['agent' => $agent, 'email' => $email, 'message' => $message, 'created_at' => $created_at];
		\App\Models\GaapMessage::create($input);

		return redirect()->route('gaapHome');
	}


}
