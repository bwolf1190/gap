<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use Session;
use Flash;


class BrokerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


	/**
	 * Display a listing of the broker.
	 */
	public function index()
	{
		$brokers = \App\Models\Broker::paginate(15);
		return view('brokers.index')->with('brokers', $brokers);
	}

	
	/**
	 * Return enrollments for authenticated broker.
	 */
	public function enrollments(){
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
	 * Export enrollments to xls file for given broker
	 * Redirect to plans table
	 */
	public function exportEnrollments($broker){
		$enrollments = \App\Models\Enrollment::where('agent_code', $broker)->get()->toArray();
		\Excel::create('enrollments', function($excel) use($enrollments){
			$excel->sheet('Sheet 1', function($sheet) use($enrollments){
				$sheet->fromArray($enrollments);
			});
		})->export('xls');

		$this->enrollments();
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
	 * Export plans to xls file for given broker
	 * Redirect to plans table
	 */
	public function exportPlans($broker){
		$plans = \App\Models\Plan::where('promo', $broker)->get()->toArray();
		\Excel::create('plans', function($excel) use($plans){
			$excel->sheet('Sheet 1', function($sheet) use($plans){
				$sheet->fromArray($plans);
			});
		})->export('xls');

		$this->plans($broker);
	}


	/**
	 * Return subagents for authenticated broker.
	 */
	public function subAgents($broker){
		$broker = \App\Models\Broker::where('name', $broker)->first();
		$subAgents = \App\Models\SubAgent::where('broker_id', $broker->id)->paginate(15);
		return view('brokers.admin.subagents.index')
				->with('subagents', $subAgents);
	}

	
	/**
	 * Export subagents to xls file for given broker
	 * Redirect to subagents table
	 */
	public function exportSubAgents($broker){
		$broker = \App\Models\Broker::where('name', $broker)->first();
		$subagents = \App\Models\SubAgent::where('broker_id', $broker->id)->get()->toArray();
		\Excel::create('subagents', function($excel) use($subagents){
			$excel->sheet('Sheet 1', function($sheet) use($subagents){
				$sheet->fromArray($subagents);
			});
		})->export('xls');

		$this->subAgents($broker->name);
	}


	/**
	 * Show the form for creating a new broker.
	 */
	public function create()
	{
		return view('brokers.create');
	}

	
	/**
	 * Store a newly created broker in storage.
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
