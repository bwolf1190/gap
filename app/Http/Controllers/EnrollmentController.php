<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use Session;
use Flash;
use DB;


class EnrollmentController extends Controller
{

	function __construct()
	{
		$this->middleware('admin', ['except' => ['start','startBroker', 'addEnrollment']]);
	}


	/**
	 * Send customer to enroll page
	 */
	public function start($type = null, $promo = null){
		if(is_null($type)){
			$type = 'web';
		}

		return view('enroll')->with('type', $type);
	}


	/**
	 * Send the broker to the enroll page
	 */
	public function startBroker($promo, $type='broker'){
		$promo = strtoupper($promo);

		return view('enroll-broker')->with('promo', $promo)->with('type', $type); 
	}


	/**
	 * Add enrollments for web/internal/broker/p2c
	 */
	public function addEnrollment($type, $id, $agent = '', $agent_code = '', $sub_agent_code = ''){
		$customer = \App\Models\Customer::where('id',$id)->first();
		$plan = \App\Models\Plan::where('id', $customer->plan_id)->first();

		// random string concat with random number
	    	$str = random_str(10);
		$confirmation_code = $str . mt_rand();
		
		$input = ['enroll_date'       => date('Y-m-d H:i:s'),
				  'confirm_date'      => 'NULL',
				  'p2c'               => $plan->code, 
				  'agent_id'		  => $agent,
				  'customer_id'       => $customer->id, 
				  'plan_id'           => $plan->id, 
				  'confirmation_code' => $confirmation_code,
				  'status'			  => 'PENDING',
				  'agent_code'		  => $agent_code,
				  'sub_agent_code'	  => $sub_agent_code,
				  'type'			  => $type];

		$enrollment = \App\Models\Enrollment::create($input);
		
		if(is_null($plan->code)){
			$plan->code='Duke';
		}

		if(is_null($plan->entry_fee)){
			return redirect()->route('welcome', array('customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment));
		}
		
		return view('stripe.stripe')->with('customer', $customer->id)->with('plan', $plan->id)->with('amount', $plan->entry_fee);
	}


	/**
	 * Display a listing of the Enrollment.
	 */
	public function index()
	{
		$enrollments = \App\Models\Enrollment::paginate(10);
		
		return view('enrollments.index')
			->with('enrollments', $enrollments);
	}

	public function sortEnrollments($column){
		$enrollments = \App\Models\Enrollment::orderBy($column)->paginate(10);

		return view('enrollments.index')
			->with('enrollments', $enrollments);	
	}

	
	/**
	 * Show the form for creating a new Enrollment.
	 */
	public function create()
	{
		return view('enrollments.create');
	}

	
	/**
	 * Store a newly created Enrollment in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$enrollment = \App\Models\Enrollment::create($input);

		return redirect('enrollments');
	}

	
	/**
	 * Display the specified Enrollment.
	 */
	public function show($id)
	{
		$enrollment = \App\Models\Enrollment::find($id);

		if(empty($enrollment))
		{
			return redirect('enrollments');
		}

		return view('enrollments.show')->with('enrollment', $enrollment);
	}

	
	/**
	 * Show the form for editing the specified Enrollment.
	 */
	public function edit($id)
	{
		$enrollment = \App\Models\Enrollment::find($id);

		if(empty($enrollment))
		{

			return redirect(route('enrollments.index'));
		}

		return view('enrollments.edit')->with('enrollment', $enrollment);
	}

	
	/**
	 * Update the specified Enrollment in storage.
	 */
	public function update($id, Request $request)
	{
		$enrollment = \App\Models\Enrollment::find($id);

		if(empty($enrollment))
		{

			return redirect('enrollments');
		}

		$enrollment->update($request->all());

		return redirect('enrollments');
	}

	
	/**
	 * Remove the specified Enrollment from storage.
	 */
	public function destroy($id)
	{
		$enrollment = \App\Models\Enrollment::find($id);

		if(empty($enrollment))
		{

			return redirect(route('enrollments.index'));
		}

		$enrollment->delete($id);

		return redirect('enrollments');
	}
}
