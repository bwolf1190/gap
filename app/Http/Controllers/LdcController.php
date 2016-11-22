<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use SoapClient;
use Response;
use Session;
use Flash;


class LdcController extends Controller
{

	function __construct()
	{
		$this->middleware('admin', ['except' => ['search', 'internalSearch', 'brokerLdcs', 'getLdc', 'searchByState']]);
	}


	/**
	 * Use zip code to search for utility companies by state
	 */
	function search($s = null){
		if(Input::get('type') === null){
			$type = 'web';
		}
		else{
			$type = Input::get('type');
		}

		$zip   = Input::get('zip');
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

		$sub_zip      = substr($zip, 0,3);
		$state        = \App\Models\State::where('zip_prefix', $sub_zip)->first();
		$zip_prefix   = $state->zip_prefix;
		$state_code   = $state->state_code;
		$maryland     = ['BGE', 'Delmarva', 'MetEd', 'PEPCO'];
		$ohio         = ['Duke'];
		$pennsylvania = ['Duquesne', 'PECO', 'PPL'];

		if($state_code === 'MD'){
			foreach($maryland as $ldc){
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}
		}
		if($state_code === 'OH'){
			foreach($ohio as $ldc){
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}
		}
		if($state_code === 'PA'){
			foreach($pennsylvania as $ldc){
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
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
	 * Get the utility companies by zip code with SOAP call
	 */
	function getLdc($s = null){
		$url           = env('SOAP_URL');
		$user          = env('SOAP_USER');
		$pw            = env('SOAP_PW');
		$output_params = array("output_xml;8000");
		$lang          = env('SOAP_LANG');
		$entno         = env('SOAP_ENTNO');
		$client        = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

		if(Input::get('type') === null){
			$type = 'web';
		}
		else{
			$type = Input::get('type');
		}

		$zip   = Input::get('zip');
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

	    $xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>RS_sp_DR_Offers_by_Zip</proc_type><entno>4270</entno><zip>" . $zip . "</zip><rev_type>R</rev_type><utility_type>E</utility_type></ReadiSystem>]]></string>";

	    $xml_obj = simplexml_load_string($xml_string);

		$client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 

		$response = $client->__getLastResponse(); 

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
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
	 * Search for LDC based on zip code.
	 * If only 1 LDC is available for the zip code, return plans for that LDC.
	 * Else return multiple LDCs for the user to choose from.
	 */
	/*public function search($s = null){
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

		$zips = \App\Models\Zip::where('zip', $zip)->groupBy('ldc_id')->get();

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
*/
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
	 */
	public function index()
	{
		$ldcs = \App\Models\Ldc::paginate(10);

		return view('ldcs.index')
			->with('ldcs', $ldcs);
	}

	
	/**
	 * Show the form for creating a new Ldc.
	 */
	public function create()
	{
		return view('ldcs.create');
	}

	
	/**
	 * Store a newly created Ldc in storage.
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
