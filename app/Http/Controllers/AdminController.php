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


class AdminController extends Controller
{
	public function __construct(){
        $this->middleware('admin', ['except' => ['showAll', 'showBrokerEnrollments', 'resendEmails']]);

	}

	/**
	 * Sends the users with role of admin to dashboard
	 * Sends users without admin role to login page
	 */
	public function index(){
		if(\Auth::user()->role === 'admin'){
			return view('admin.dashboard');
		}
		else{
			return redirect('/login');
		}
	}

	/**
	 * Returns all broker enrollments
	 */
	public function showAll($sort = null){
		$brokers = \App\Models\Broker::all();
		$enrollments = \App\Models\Enrollment::all();
		$brokerEnrollments = [];

		foreach($enrollments as $e){
			$plan = $e->plan;
			if($plan->promo != ''){
				array_push($brokerEnrollments, $e);
			}
		}

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = collect($brokerEnrollments);
        if(!is_null($sort)){
        	$collection = $collection->sortByDesc($sort);
        }
        //Create our paginator and pass it to the view
        $paginatedSearchResults = new LengthAwarePaginator($collection, count($collection), 10000000000000000000000);

		return view('broker-enrollments.index')
				->with('enrollments', $paginatedSearchResults)->with('brokers', $brokers);
	}

	/**
	 * Returns plans for a given broker
	 */
	public function showBrokerEnrollments($broker, $sort = null){
		$brokerPlans = \App\Models\Plan::where('promo', $broker)->get();
		$brokers = \App\Models\Broker::all();
		$brokerEnrollments = [];

		foreach($brokerPlans as $p){
			if(!is_null($sort)){
				$brokerEnrollments = \App\Models\Enrollment::orderBy($sort, 'desc')->where('plan_id', $p->id)->paginate(15);
			}
			else{
				$brokerEnrollments = \App\Models\Enrollment::where('plan_id', $p->id)->paginate(15);
			}
		}

		return view('broker-enrollments.index')
				->with('enrollments', $brokerEnrollments)->with('brokers', $brokers);
	}

	/**
	 * Returns all P2CEnrollments
	 */
	public function showP2CEnrollments(){
		$p = DB::select('select * from enrollments_p2c');
	}

	public function internalEnrollments(){
		$enrollments = \App\Models\Enrollment::where('type', 'internal')->paginate(15);

		return view('enrollments.index')->with('enrollments', $enrollments);
	}

	/**
	 * Resend confirmation emails to pending before a chosen date
	 */
	public function resendEmails(Request $request){
		$request = $request->all();
		// remove csrf token from array
		$request = array_except($request, ['_token']);

		foreach($request as $r){
			$enrollment = \App\Models\Enrollment::find($r);
			$customer = $enrollment->customer;
			$plan = $enrollment->plan;

			Mail::queue('emails.welcome', ['customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment], function ($m) use ($customer, $plan, $enrollment) {
	                $m->from('Enrollment@greatamericanpower.com', 'GAP');
	                $m->to($customer->email);
	                $m->subject("Email Confirmation");
	        });

			$enrollment->status = 'RESENT';
			$enrollment->save();
		}

		$enrollments = \App\Models\Enrollment::orderBy('enroll_date')->paginate(10);

		return redirect()->route('enrollments.index');

	}
/*
	public function resendEmails(Request $request){
		$request = $request->all();
		$days = $request['days'];
		$curr_date = Carbon::now();
		$send_after_date = $curr_date->subDays($days);
		$send_before_date = $curr_date->subDays(1);
		$resend_to = \App\Models\Enrollment::where('enroll_date', '<', $send_after_date)
										   ->where('enroll_date', '<', $send_before_date)
										   ->where('status', 'PENDING')->get();

		
		foreach($resend_to as $enrollment){
			$customer = $enrollment->customer;
			$plan = $enrollment->plan;
			Mail::queue('emails.welcome', ['customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment], function ($m) use ($customer, $plan, $enrollment) {
	                $m->from('Enrollment@greatamericanpower.com', 'GAP');
	                $m->to($customer->email);
	                $m->subject("Email Confirmation");
	        });


			$enrollment->status = 'RESENT';
			$enrollment->save();
			// testing 
	        //print_r($customer->fname . ' ' . $customer->email . ' ' . $plan->rate . '<br><br>');	
		}



		$enrollments = \App\Models\Enrollment::orderBy('enroll_date')->paginate(10);

		return redirect()->route('enrollments.index');

	}
*/

}