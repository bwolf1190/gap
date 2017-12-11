<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use Session;
use Flash;


class ZipController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

	
	/**
	 * Display a listing of the zip.
	 */
	public function index()
	{
		$zips = \App\Models\Zip::paginate(15);
		return view('zips.index')->with('zips', $zips);
	}


	/**
	 * Show the form for creating a new zip.
	 */
	public function create()
	{
		return view('zips.create');
	}


	/**
	 * Store a newly created zip in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		\App\Models\Zip::Create($input);

		Flash::success('zip saved successfully.');

		return redirect('zips');
	}

	
	/**
	 * Display the specified zip.
	 */
	public function show($id)
	{
		$zip = \App\Models\Zip::find($id);

		if(empty($zip))
		{
			Flash::error('zip not found');

			return redirect('zips');
		}

		return view('zips.show')->with('zip', $zip);
	}

	
	/**
	 * Show the form for editing the specified zip.
	 */
	public function edit($id)
	{
		$zip = \App\Models\Zip::find($id);

		if(empty($zip))
		{
			Flash::error('zip not found');

			return redirect(route('zips.index'));
		}

		return view('zips.edit')->with('zip', $zip);
	}

	
	/**
	 * Update the specified zip in storage.
	 */
	public function update($id, Request $request)
	{
		$zip = \App\Models\Zip::find($id);

		if(empty($zip))
		{
			Flash::error('zip not found');

			return redirect(route('zips.index'));
		}

		$zip->update($request->all());

		Flash::success('zip updated successfully.');

		return redirect('zips');
	}

	
	/**
	 * Remove the specified zip from storage.
	 */
	public function destroy($id)
	{
		$zip = \App\Models\Zip::find($id);

		if(empty($zip))
		{
			Flash::error('zip not found');

			return redirect(route('zips.index'));
		}

		$zip->delete($id);

		Flash::success('zip deleted successfully.');

		return redirect('zips');
	}
}
