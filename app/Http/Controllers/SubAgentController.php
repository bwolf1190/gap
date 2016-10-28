<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use Session;
use Flash;


class SubAgentController extends Controller
{

	function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the SubAgent.
	 */
	public function index()
	{
		$subagents = \App\Models\SubAgent::paginate(10);

		return view('brokers.admin.subagents.index')
			->with('subagents', $subagents);
	}

	
	/**
	 * Store a newly created SubAgent in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$subagent = \App\Models\SubAgent::create($input);

		Flash::success('Subagent saved successfully.');

		return redirect('brokers.admin.subagents');
	}


	/**
	 * Display the specified SubAgent.
	 */
	public function show($id)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		return view('brokers.admin.subagents.show')->with('subagent', $subagent);
	}

	
	/**
	 * Show the form for editing the specified SubAgent.
	 */
	public function edit($id)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		return view('brokers.admin.subagents.edit')->with('subagent', $subagent);
	}

	
	/**
	 * Update the specified SubAgent in storage.
	 */
	public function update($id, Request $request)
	{
		$subagent = \App\Models\SubAgent::find($id);
		$broker = \App\Models\Broker::find($subagent->broker_id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');
			return redirect('subagents');
		}

		$subagent->update($request->all());

		Flash::success('Subagent updated successfully.');

		return redirect('broker/subagents/' . $broker->promo);
	}


	/**
	 * Remove the specified SubAgent from storage.
	 */
	public function destroy($id)
	{
		$subagent = \App\Models\SubAgent::find($id);
		$broker = \App\Models\Broker::find($subagent->broker_id);
		
		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		$subagent->delete($id);

		Flash::success('Subagent deleted successfully.');

		return redirect('broker/subagents/' . $broker->promo);
	}
}
