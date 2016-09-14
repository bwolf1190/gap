<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class InternalEnrollmentController extends Controller
{

	public function start(){
		return view('internal-enrollments.enroll');
	}

	public function startBroker($promo){
		$promo = strtoupper($promo);
		return view('enroll-broker')->with('promo', $promo);
	}

	public function addEnrollment($id){
		$customer = \App\Models\Customer::where('id',$id)->first();
		$plan = \App\Models\Plan::where('id', $customer->plan_id)->first();
		// random string function
		$length = 10;
		$keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $str = '';
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $str .= $keyspace[random_int(0, $max)];
	    }

		$confirmation_code = $str . mt_rand();
		
		$input = ['enroll_date'       => date("Y-m-d H:i:s"),
				  'confirm_date'      => 'NULL',
				  'p2c'               => $plan->code, 
				  'customer_id'       => $customer->id, 
				  'plan_id'           => $plan->id, 
				  'confirmation_code' => $confirmation_code];

		$enrollment = \App\Models\Enrollment::create($input);

		/* Handle P2C Enrollments */
		if($plan->type === "Commercial"){
			$First_Name = "";
			$Last_Name = "";
			$Customer_Name = $customer->fname;
			$Home_Phone_Num = "";
			$Work_Phone_Num = $customer->phone;
			$Federal_Tax_Id_Num = $customer->Fed_Tax_Id_Num;
		}
		else{
			$First_Name = $customer->fname;
			$Last_Name = $customer->lname;
			$Customer_Name = "";
			$Home_Phone_Num = $customer->phone;
			$Work_Phone_Num = "";
			$Federal_Tax_Id_Num = "";
		}

		$p2c_input = ['Revenue_Class_Desc'   => $plan->type,
					  'First_Name'           => $First_Name,
					  'Last_Name'            => $Last_Name,
					  'Customer_Name'        => $Customer_Name,
					  'Home_Phone_Num'       => $Home_Phone_Num,
					  'Work_Phone_Num'       => $Work_Phone_Num,
					  'Fed_Tax_Id_Num'       => $Federal_Tax_Id_Num,
					  'SLine1_Addr'          => $customer->sa1,
					  'SCity_Name'           => $customer->scity,
					  'SCounty_Name'         => "",
					  'SPostal_Code'         => $customer->szip,
					  'Marketer_Name'        => "Great American Power, LLC",
					  'Distributor_Name'     => $plan->ldc,
					  'Service_Type_Desc'    => "",
					  'Bill_Method'          => "",
					  'LDC_Account_Num'      => $customer->acc_num,
					  'Enroll_Type_Desc'     => "",
					  'Requested_Start_Date' => $enrollment->enroll_date,
					  'Plan_Desc'            => $plan->code];

		$p2c_enrollment = \App\Models\EnrollmentP2C::create($p2c_input);
		/* End P2C Enrollment */

		Session::forget('zip');
		Session::forget('state');

		//return view('enrollments.show')->with('enrollment', $enrollment);
		return redirect()->route('welcome', $customer);
	}

	/**
	 * Display a listing of the Enrollment.
	 *
	 * @return Response
	 */
	public function index()
	{
		$enrollments = \App\Models\InternalEnrollment::paginate(10);

		return view('internal-enrollments.index')
			->with('enrollments', $enrollments);
	}

	public function sortEnrollments($column){
		$enrollments = \App\Models\InternalEnrollment::orderBy($column)->paginate(10);

		return view('internal-enrollments.index')
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

		return view('internal-enrollments.edit')->with('internalEnrollment', $internalEnrollment);
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

			return redirect('internalEnrollments');
		}

		$enrollment->update($request->all());

		return redirect('internalEnrollments');
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

			return redirect(route('internalEnrollments.index'));
		}

		$enrollment->delete($id);


		return redirect('internalEnrollments');
	}
}
