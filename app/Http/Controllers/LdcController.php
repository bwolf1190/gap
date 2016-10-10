<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;

class LdcController extends Controller
{

	function __construct()
	{
		$this->middleware('auth', ['except' => ['search', 'internalSearch', 'brokerLdcs']]);
	}

	/**
	 * Search for LDC based on zip code.
	 * If only 1 LDC is available for the zip code, return plans for that LDC.
	 * Else return multiple LDCs for the user to choose from.
	 */
	public function search($s = null){
		if(Input::get('type') === null){
			$type = 'web';
		}
		else{
			$type = Input::get('type');
		}

		$zip = Input::get('zip');
		$promo = Input::get('promo');
		Session::put('zip', $zip);

		// if zip code is entered on welcome page the residential or commercial button was used
		if(Input::get('Residential')){
			$service = "Residential";
		}
		else if(Input::get("Commercial")){
			$service = "Commercial";
		}
		// else the zip is entered from enroll page and service is found with radio button
		else{
			$service = Input::get('service');
		}

		$zips = \App\Models\Zip::where('zip', $zip)->get();

		foreach($zips as $z){
			$ldc_id = $z->ldc_id;
			$ldcs[] = \App\Models\Ldc::find((int)$ldc_id);
		}

		if(empty($ldcs)){
			return view('no-service')->with('z', $zip)->with('s', $service)->with('p', $promo);
		}

		// if there is only 1 LDC for the zip code, then send them straight to the plans
		$count = count($ldcs);
		if($count === 1){
			return redirect()->route('searchPlans', array('type' => $type, 's' => $service, 'l' => $ldcs[0]->ldc, 'promo' => $promo));
		}

		return view('ldcs.findex')->with('type', $type)->with('service', $service)->with('ldcs', $ldcs)->with('promo', $promo);
	}

	/**
	 * Search for LDC for broker based on zip code.
	 * If only 1 LDC is available for the zip code, return plans for that LDC.
	 * Else return multiple LDCs for the user to choose from.
	 */
	public function brokerLdcs(){
		$zip = Input::get('zip');
		$service = Input::get('service');
		$promo = Input::get('promo');
		$type = Input::get('type');
		Session::put('zip', $zip);

		$zips = \App\Models\Zip::where('zip', $zip)->get();
		$broker = \App\Models\Broker::where('promo', $promo)->first();
		$broker_ldcs = $broker->ldcs;

		foreach($zips as $z){
			$ldc_id = $z->ldc_id;
			$ldc = \App\Models\Ldc::find((int)$ldc_id);

			foreach($broker_ldcs as $bs){
				if($ldc->id == $bs->id){
					$ldcs[] = $ldc;
				}
			}
		}

		if(empty($ldcs)){
			return view('no-service')->with('z', $zip)->with('s', $service)->with('p', $promo);
		}

		// if there is only 1 LDC for the zip code, then send them straight to the plans
		$count = count($ldcs);
		if($count === 1){
			return redirect()->route('searchPlans', array('type' => $type, 's' => $service, 'l' => $ldcs[0]->ldc, 'promo' => $promo));
		}

		return view('ldcs.findex')->with('type', $type)->with('service', $service)->with('ldcs', $ldcs)->with('promo', $promo);
	}



	/**
	 * Display a listing of the Ldc.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ldcs = \App\Models\Ldc::paginate(10);

		return view('ldcs.index')
			->with('ldcs', $ldcs);
	}

	/**
	 * Show the form for creating a new Ldc.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ldcs.create');
	}

	/**
	 * Store a newly created Ldc in storage.
	 *
	 * @param CreateLdcRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$ldc = \App\Models\Ldc::create($input);

		Flash::success('Ldc saved successfully.');

		return redirect('ldcs');
	}

	/**
	 * Display the specified Ldc.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ldc = \App\Models\Ldc::find($id);

		if(empty($ldc))
		{
			Flash::error('Ldc not found');

			return redirect('ldcs');
		}

		return view('ldcs.show')->with('ldc', $ldc);
	}

	/**
	 * Show the form for editing the specified Ldc.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$ldc = \App\Models\Ldc::find($id);

		if(empty($ldc))
		{
			Flash::error('Ldc not found');

			return redirect('ldcs');
		}

		return view('ldcs.edit')->with('ldc', $ldc);
	}

	/**
	 * Update the specified Ldc in storage.
	 *
	 * @param  int              $id
	 * @param UpdateLdcRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$ldc = \App\Models\Ldc::find($id);

		if(empty($ldc))
		{
			Flash::error('Ldc not found');
			return redirect('ldcs');
		}

		$ldc->update($request->all());

		Flash::success('Ldc updated successfully.');

		return redirect('ldcs');
	}

	/**
	 * Remove the specified Ldc from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ldc = \App\Models\Ldc::find($id);

		if(empty($ldc))
		{
			Flash::error('Ldc not found');

			return redirect('ldcs');
		}

		$ldc->delete($id);

		Flash::success('Ldc deleted successfully.');

		return redirect('ldcs');
	}
}
