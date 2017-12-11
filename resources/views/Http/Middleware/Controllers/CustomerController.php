<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use Session;
use Flash;


class CustomerController extends Controller
{
	
	function __construct()
	{
		$this->middleware('admin', ['except' => ['start', 'internalStart', 'store']]);
	}


	/**
	 * Send customer to first part of enrollment form
	 */
	public function start($type, $id, $promo = null)
	{
		$plan    = \App\Models\Plan::where('id',(int)$id)->first();
		$ldc     = \App\Models\Ldc::where('ldc',$plan->ldc)->first();
		$zip     = Session::get('zip');
		$sub_zip = substr($zip, 0,3);
		
		if($sub_zip !== ''){
			$state   = \App\Models\State::where('zip_prefix', $sub_zip)->first()->state_code;
		}
		else{
			if($ldc->ldc === 'BGE' || $ldc->ldc === 'Delmarva' || $ldc->ldc === 'PEPCO'){
				$state = 'MD';
			}
			else if($ldc->ldc === 'Duke'){
				$state = 'OH';
			}
			else{
				$state = 'PA';
			}
		}

		return view('customers.start')->with('ldc', $ldc) 
									  ->with('plan', $plan)
									  ->with('promo', $promo)
									  ->with('zip', $zip)
									  ->with('state', $state)
									  ->with('type', $type);
	}

	
	/**
	 * Send agent to first part of internal enrollment form
	 */
	public function internalStart($type, $id){
		$plan    = \App\Models\Plan::where('id',(int)$id)->first();
		$ldc     = \App\Models\Ldc::where('ldc',$plan->ldc)->first();
		$zip     = Session::get('zip');
		$sub_zip = substr($zip, 0,3);
		$state   = \App\Models\State::where('zip_prefix', $sub_zip)->first()->state_code;

		return view('internal-enrollments.start')->with('type', $type)->with('ldc', $ldc)->with('plan', $plan)->with('zip', $zip)->with('state', $state);
	}

	/**
	 * Display a listing of the Customer.
	 */
	public function index()
	{
		$customers = \App\Models\Customer::orderBy('id', 'desc')->paginate(15);

		return view('customers.index')
			->with('customers', $customers);
	}

	public function sortCustomers($column){
		$customers = \App\Models\Customer::orderBy($column)->paginate(10);

		return view('customers.index')
			->with('customers', $customers);
	}

	/**
	 * Show the form for creating a new Customer.
	 */
	public function create()
	{
		return view('customers.create');
	}

	/**
	 * Store a newly created Customer in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$type = Input::get('type');
		
		if($input['honey'] !== ''){
			return redirect('/');
		}
	
		if(isset($input['file'])){
			$file = $request->file();

			$validator = Validator::make($input, [
	    		'file' => 'mimes:csv,xlsx,txt,pdf'
			]);
			
			// js file must be handled individually as it evaluates to text/plain with the validator
			if($validator->fails() || $file->guessClientExtension() === 'js'){
				return redirect()->back()->withInput($input);
			}

			$file->move(__DIR__.'/storage/', $file->getClientOriginalName());
		}


		$existing_customer = \App\Models\Customer::where('acc_num', $input['acc_num'])->first();

		// create the customer if they don't already exist 
		if($existing_customer){
			return view('already-customer');
		}
		else{
			$customer = \App\Models\Customer::create($input);
			$customer->update(['status' => 'PENDING']);
			$customer->update(['plan_description' => $customer->getPlanDescription()]);
		}

		$plan = \App\Models\Plan::where('id', $input['plan_id'])->first();
		$agent = Input::get('agent_id');
		$agent_code = Input::get('agent_code');
		
		if($agent === null && $agent_code !== null){
			$agent = 'b';
		}
		
		$sub_agent_code = Input::get('sub_agent_code');
	
		return redirect()->route('addEnrollment', array('type' => $type,
								'id' => $customer->id, 
								'agent' => $agent, 
								'agent_code' => $agent_code, 
								'sub_agent_code' => $sub_agent_code));
	}

	/**
	 * Display the specified Customer.
	 */
	public function show($id)
	{
		$customer = \App\Models\Customer::find($id);

		if(empty($customer))
		{
			return redirect('customers');
		}

		return view('customers.show')->with('customer', $customer);
	}

	/**
	 * Show the form for editing the specified Customer.
	 */
	public function edit($id)
	{
		$customer = \App\Models\Customer::find($id);

		if(empty($customer))
		{
			return redirect('customers');
		}

		return view('customers.edit')->with('customer', $customer);
	}

	/**
	 * Update the specified Customer in storage.
	 */
	public function update($id, Request $request)
	{
		$customer = \App\Models\Customer::find($id);
		$enrollment = $customer->enrollment;
		$enrollment_p2c = $customer->enrollment_p2c;

		if(empty($customer))
		{
			Flash::error('Customer not found');

			return redirect(route('customers.index'));
		}

		$customer->update($request->all());

		// update enrollment and enrollment_p2c to adjust for potential editing status of customer through admin portal
		$enrollment->update(['status' => $request['status']]);
		$enrollment_p2c->update(['status' => $request['status']]);

		return redirect('customers');;
	}

	/**
	 * Remove the specified Customer from storage.
	 */
	public function destroy($id)
	{
		$customer = \App\Models\Customer::find($id);

		if(empty($customer))
		{
			return redirect(route('customers.index'));
		}

		$this->customerRepository->delete($id);

		return redirect('customers');
	}
}
