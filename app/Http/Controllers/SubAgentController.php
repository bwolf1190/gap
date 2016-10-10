<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
	 *
	 * @return Response
	 */
	public function index()
	{
		$subagents = \App\Models\SubAgent::paginate(10);

		return view('subagents.index')
			->with('subagents', $subagents);
	}

	/**
	 * Store a newly created SubAgent in storage.
	 *
	 * @param CreateSubAgentRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$subagent = \App\Models\SubAgent::create($input);

		Flash::success('Subagent saved successfully.');

		return redirect('subagents');
	}

	/**
	 * Display the specified SubAgent.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		return view('subagents.show')->with('subagent', $subagent);
	}

	/**
	 * Show the form for editing the specified SubAgent.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		return view('subagents.edit')->with('subagent', $subagent);
	}

	/**
	 * Update the specified SubAgent in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSubAgentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');
			return redirect('subagents');
		}

		$subagent->update($request->all());

		Flash::success('Subagent updated successfully.');

		return redirect('subagents');
	}

	/**
	 * Remove the specified SubAgent from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$subagent = \App\Models\SubAgent::find($id);

		if(empty($subagent))
		{
			Flash::error('Subagent not found');

			return redirect('subagents');
		}

		$subagent->delete($id);

		Flash::success('Subagent deleted successfully.');

		return redirect('subagents');
	}
}
