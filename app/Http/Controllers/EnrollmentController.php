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

	public function start($promo = null){
		return view('enroll');
	}

	public function startBroker($promo){
		$promo = strtoupper($promo);

		return view('enroll-broker')->with('promo', $promo);
	}


	public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $str = '';
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $str .= $keyspace[random_int(0, $max)];
	    }
	    return $str;
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
		
		$input = ['enroll_date' => date("Y-m-d H:i:s"),
				  'confirm_date' => 'NULL',
				  'p2c' => $plan->code, 
				  'customer_id' => $customer->id, 
				  'plan_id' => $plan->id, 
				  'confirmation_code' => $confirmation_code];

		$enrollment = \App\Models\Enrollment::create($input);

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
		$enrollments = \App\Models\Enrollment::paginate(10);

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
