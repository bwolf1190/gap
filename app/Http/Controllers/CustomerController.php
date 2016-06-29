<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class CustomerController extends Controller
{

	/** @var  CustomerRepository */
	private $customerRepository;

	function __construct()
	{
		$this->middleware('auth', ['except' => ['start', 'store']]);
	}



	public function start($id, $promo = null)
	{
		// changed from get() to first() when adding ldc variable to view for customer_identifier
		//$plan = \App\Models\Plan::where('id',(int)$id)->get();
		$plan = \App\Models\Plan::where('id',(int)$id)->first();
		$ldc = \App\Models\Ldc::where('ldc',$plan->ldc)->first();
		$zip = Session::get('zip');
		$state;
		if(substr($zip, 0, 1)){
			$state = 'Pennsylvania';
		}
		else{
			$state = "Maryland";
		}

		return view('customers.start')->with('ldc', $ldc)->with('plan', $id)->with('promo', $promo)->with('zip', $zip)->with('state', $state);
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
		$customer = \App\Models\Customer::create($input);
		$plan = \App\Models\Plan::where('id', $input['plan_id'])->get();

		//return view('customers.show')->with('customer', $customer)->with('input', $plan);
		return redirect()->route('addEnrollment', $customer->id);
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
