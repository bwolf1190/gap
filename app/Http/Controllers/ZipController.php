<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class ZipController extends Controller
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
	 * Display a listing of the zip.
	 *
	 * @return Response
	 */
	public function index()
	{
		$zips = \App\Models\Zip::paginate(15);
		return view('zips.index')->with('zips', $zips);
	}

	/**
	 * Show the form for creating a new zip.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('zips.create');
	}

	/**
	 * Store a newly created zip in storage.
	 *
	 * @param CreatezipRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int              $id
	 * @param UpdatezipRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
