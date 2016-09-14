<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;
use Debugbar;
use Validator;



class CustomerController extends Controller
{

	/** @var  CustomerRepository */
	private $customerRepository;

	function __construct()
	{
		$this->middleware('auth', ['except' => ['start', 'internalStart', 'store']]);
	}



	public function start($id, $promo = null)
	{
		$plan = \App\Models\Plan::where('id',(int)$id)->first();
		$ldc = \App\Models\Ldc::where('ldc',$plan->ldc)->first();
		$zip = Session::get('zip');

		$state = '';
		if(substr($zip, 0, 1)){
			$state = 'PA';
		}
		else if($zip == ''){
			$state = '';
		}
		else{
			$state = 'MD';
		}

		return view('customers.start')->with('ldc', $ldc)->with('plan', $plan)->with('promo', $promo)->with('zip', $zip)->with('state', $state);
	}

	public function internalStart($id){
		$plan = \App\Models\Plan::where('id',(int)$id)->first();
		$ldc = \App\Models\Ldc::where('ldc',$plan->ldc)->first();
		$zip = Session::get('zip');	

		$state = '';
		if(substr($zip, 0, 1)){
			$state = 'PA';
		}
		else{
			$state = 'MD';
		}

		return view('internal-enrollments.start')->with('ldc', $ldc)->with('plan', $plan)->with('zip', $zip)->with('state', $state);
	}

	/**
	 * Display a listing of the Customer.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = \App\Models\Customer::paginate(10);

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
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('customers.create');
	}

	/**
	 * Store a newly created Customer in storage.
	 *
	 * @param CreateCustomerRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		if(isset($input['file'])){
			$file = $input['file'];

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
		}

		$plan = \App\Models\Plan::where('id', $input['plan_id'])->first();
		$agent = Input::get('agent_id');
		$agent_code = Input::get('agent_code');
		
		if($agent === null && $agent_code !== null){
			$agent = 'b';
		}
		$sub_agent_code = Input::get('sub_agent_code');

		return redirect()->route('addEnrollment', array('id' => $customer->id, 
														'agent' => $agent, 
														'agent_code' => $agent_code, 
														'sub_agent_code' => $sub_agent_code));
	}

	/**
	 * Display the specified Customer.
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int              $id
	 * @param UpdateCustomerRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$customer = \App\Models\Customer::find($id);

		if(empty($customer))
		{
			Flash::error('Customer not found');

			return redirect(route('customers.index'));
		}

		$customer->update($request->all());

		return redirect('customers');;
	}

	/**
	 * Remove the specified Customer from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
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
