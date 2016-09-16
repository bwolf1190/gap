<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;



class EnrollmentController extends Controller
{

	function __construct()
	{
		$this->middleware('auth', ['except' => ['start','startBroker', 'addEnrollment']]);
	}

	/**
	 * Send customer to enroll page
	 */
	public function start( $type, $promo = null){
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
	public function addEnrollment($type, $id, $agent = null, $agent_code = null, $sub_agent_code = null){
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

		$p2c_input = ['Revenue_Class_Desc'   => $plan->type,
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
					  'SPostal_Code'         => $customer->szip . '0000',
					  'Marketer_Name'        => 'Great American Power, LLC',
					  'Distributor_Name'     => $plan->ldc,
					  'Service_Type_Desc'    => 'Electric',
					  'Bill_Method'          => '2',
					  'LDC_Account_Num'      => $customer->acc_num,
					  'Enroll_Type_Desc'     => 'External',
					  'Requested_Start_Date' => '="' . $start_date . '"',
					  'Plan_Desc'            => $plan->code,
					  'Contract_Start_Date'  => '="' . $start_date . '"',
					  'Contract_End_Date'    => '="' . $Contract_End_Date . '"',
					  'Agent_Code'			 => $agent_code,
					  'MLine1_Addr'			 => $customer->ma1,
					  'MLine2_Addr'			 => $customer->ma2,
					  'MCity_Name'			 => $customer->mcity,
					  'MPostal_Code'		 => $customer->mzip,
					  'MState'				 => $customer->mstate,
					  'Master_Code'			 => 'External'];

		$p2c_enrollment = \App\Models\EnrollmentP2C::create($p2c_input);
		/* End P2C Enrollment */

		Session::forget('zip');
		Session::forget('state');

		//return view('enrollments.show')->with('enrollment', $enrollment);
		return redirect()->route('welcome', array('customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment));
	}

	/**
	 * Display a listing of the Enrollment.
	 *
	 * @return Response
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
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('enrollments.create');
	}

	/**
	 * Store a newly created Enrollment in storage.
	 *
	 * @param CreateEnrollmentRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int              $id
	 * @param UpdateEnrollmentRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
