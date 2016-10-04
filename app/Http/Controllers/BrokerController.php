<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class BrokerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


	/**
	 * Display a listing of the broker.
	 *
	 * @return Response
	 */
	public function index()
	{
		$brokers = \App\Models\Broker::paginate(15);
		return view('brokers.index')->with('brokers', $brokers);
	}

	/**
	 * Return enrollments for authenticated broker.
	 */
	public function adminHome(){
		$user = \Auth::user()->name;
		$brokerPlans = \App\Models\Plan::where('promo', $user)->get();
		$brokers = \App\Models\Broker::all();
		$brokerEnrollments = [];

		foreach($brokerPlans as $p){
			$brokerEnrollments = \App\Models\Enrollment::where('plan_id', $p->id)->paginate(15);
		}
		
		return view('brokers.admin.admin-home')->with('enrollments', $brokerEnrollments)->with('brokers', $brokers);
	}

	/**
	 * Return plans for authenticated broker.
	 */
	public function plans($broker){
		$plans = \App\Models\Plan::where('promo', $broker)->paginate(15);
		
		return view('brokers.admin.broker-plans.index')
				->with('plans', $plans);
	}

	/**
	 * Show the form for creating a new broker.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('brokers.create');
	}

	/**
	 * Store a newly created broker in storage.
	 *
	 * @param CreatebrokerRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		\App\Models\Broker::Create($input);

		Flash::success('broker saved successfully.');

		return redirect('brokers');
	}

	/**
	 * Display the specified broker.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$broker = \App\Models\Broker::find($id);

		if(empty($broker))
		{
			Flash::error('broker not found');

			return redirect('brokers');
		}

		return view('brokers.show')->with('broker', $broker);
	}

	/**
	 * Show the form for editing the specified broker.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$broker = \App\Models\Broker::find($id);

		if(empty($broker))
		{
			Flash::error('broker not found');

			return redirect(route('brokers.index'));
		}

		return view('brokers.edit')->with('broker', $broker);
	}

	/**
	 * Update the specified broker in storage.
	 *
	 * @param  int              $id
	 * @param UpdatebrokerRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$broker = \App\Models\Broker::find($id);

		if(empty($broker))
		{
			Flash::error('broker not found');

			return redirect(route('brokers.index'));
		}

		$broker->update($request->all());

		Flash::success('broker updated successfully.');

		return redirect('brokers');
	}

	/**
	 * Remove the specified broker from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$broker = \App\Models\Broker::find($id);

		if(empty($broker))
		{
			Flash::error('broker not found');

			return redirect(route('brokers.index'));
		}

		$broker->delete($id);

		Flash::success('broker deleted successfully.');

		return redirect('brokers');
	}
}
