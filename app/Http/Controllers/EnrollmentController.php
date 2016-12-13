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

		//dd($agent . ' ' . $agent_code . ' ' . $sub_agent_code);

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

		/* Handle P2C Enrollments */
		
		// must be broker enrollment
		if($agent_code !== '' && $type !== 'internal'){
			$broker = \App\Models\Broker::where('promo', $agent_code)->first();
			$Master_Code = $broker->master_code;
			$Agent_Code = $broker->agent_code;
			$Sub_Agent_Code = $broker->sub_agent_code;
			$Commission_Plan = $broker->commission_type;
			$Commission_Start_Date = date('Y-m-d');
		}
		else{
			$Master_Code = '';
			$Agent_Code = '';
			$Sub_Agent_Code = '';
			$Commission_Plan = '';
			$Commission_Start_Date = '';
		}

		$Customer_Name = $customer->fname . ' ' . $customer->lname;
		$plan_length = '+' . $plan->length . ' months';
		$Contract_End_Date = date('Y-m-d', strtotime($plan_length));
		$start_date = date('Y-m-d');

		if($plan->type === 'Commercial'){
			$Fed_Tax_Id_Num = $customer->Fed_Tax_Id_Num;
			$plan->type = 'Small ' . $plan->type;
		}
		else{
			$Fed_Tax_Id_Num = '';
		}

		// FOR P2C WEBSITE LAUNCH ONLY
			$ldc_id = \App\Models\Ldc::where('ldc', $plan->ldc)->first()->id;
			$dist_array = DB::select('select name from p2c_ldcs where ldc_id=' . $ldc_id);
			$dist_name = $dist_array[0]->name;
		// END
		
		if($plan->ldc === 'Duquesne'){
			$Bill_Method = '1';
		}
		else{
			$Bill_Method = '2';
		}
		
		// if zip code isn't 9 digits, add 4 0's
		if(strlen($customer->szip) === 5){
			$szip = "$customer->szip" . "0000";
		}
		else{
			$szip = $customer->szip;
		}
		if(strlen($customer->mzip) === 5){
			$mzip = "$customer->mzip" . "0000";
		}	
		else{
			$mzip = $customer->mzip;
		}
		
		if(title_case($customer->mstate) == 'Pennsylvania'){
			$mstate = 'PA';
		}
		else if(title_case($customer->mstate) == 'Maryland'){
			$mstate = 'MD';
		}
		else{
			$mstate = $customer->mstate;
		}	

		$p2c_input = ['status'				 => '',
					  'customer_id'			 => $customer->id,
					  'Revenue_Class_Desc'   => $plan->type,
					  'First_Name'           => $customer->fname,
					  'Last_Name'            => $customer->lname,
					  'Customer_Name'        => $Customer_Name,
					  'Home_Phone_Num'       => $customer->phone,
					  'Work_Phone_Num'       => $customer->phone,
					  'Fed_Tax_Id_Num'       => $Fed_Tax_Id_Num,
					  'Email_Address'		 => $customer->email,
					  'Contact_Name'		 => $Customer_Name,
					  'SLine1_Addr'          => $customer->sa1,
					  'SLine2_Addr'          => $customer->sa2,
					  'SCity_Name'           => $customer->scity,
					  'SPostal_Code'         => $szip,
					  'Marketer_Name'        => "Great American Power, LLC",
					  'Distributor_Name'     => $dist_name,
					  'Service_Type_Desc'    => 'Electric',
					  'Bill_Method'          => $Bill_Method,
					  'LDC_Account_Num'      => $customer->acc_num,
					  'Enroll_Type_Desc'     => 'Request',
					  'Requested_Start_Date' => $start_date,
					  'Plan_Desc'            => $plan->code,
					  'Contract_Start_Date'  => $start_date,
					  'Contract_End_Date'    => $Contract_End_Date,
					  'Agent_Code'			 => $Agent_Code,
					  'Commission_Plan'		 => $Commission_Plan,
					  'Commission_Start_Date'=> $Commission_Start_Date,
					  'MLine1_Addr'			 => $customer->ma1,
					  'MLine2_Addr'			 => $customer->ma2,
					  'MCity_Name'			 => $customer->mcity,
					  'MPostal_Code'		 => $mzip,
					  'MState'				 => $mstate,
					  'Master_Code'			 => $Master_Code,
					  'Sub_Agent_Code'		 => $Sub_Agent_Code];

		$p2c_enrollment = \App\Models\EnrollmentP2C::create($p2c_input);
		/* End P2C Enrollment */

		return redirect()->route('welcome', array('customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment));
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
		//return redirect()->route('addEnrollment');
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
