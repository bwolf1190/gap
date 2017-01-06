<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use SoapClient;
use Response;
use Session;
use Flash;
use DB;


class PlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['searchPlans', 'internalPlans', 'truncate', 'updatePlans']]);
    }


	/**
	 * Return plans for type, service, ldc, and the optional promo.
	 * If no plans exist, then redirect to modal with message.
	 */
	public function searchPlans($type, $service, $ldc, $promo = null){
		// return plans that match service and ldc
		// ordered by rate to display the larger step plans and LMF plans together
		if($promo === null){
			$ps = \App\Models\Plan::orderBy('rate', 'desc')->where('ldc', $ldc)->where('type', $service)->whereNull('promo')->get();
		}
		else{
			$ps = \App\Models\Plan::orderBy('rate', 'desc')->where('ldc', $ldc)->where('type', $service)->where('promo', $promo)->get();
		}
		
		$zip = Input::get('zip');

		foreach($ps as $p){
			$id = $p->id;
			$plans[] = \App\Models\Plan::find($id);
		}

		if(empty($plans)){
			return view('no-plans')->with('service', $service)->with('ldc', $ldc);
		}

		return view('plans.findex')->with('plans', $plans)->with('promo', $promo)->with('type', $type);
	}

	
	/**
	 * For internal enrollments completed by agents
	 * Return plans for type, service, ldc, and the optional promo.
	 * If no plans exist, then redirect to modal with message.
	 */
	public function internalPlans($service, $ldc){
		// return plans that match service and ldc
		// ordered by rate to display the larger step plans and LMF plans together

		$ps = \App\Models\Plan::orderBy('rate', 'desc')->orderBy('priority', 'desc')->where('ldc', $ldc)->where('type', $service)->get();
		
		$zip = Input::get('zip');

		foreach($ps as $p){
			$id = $p->id;
			$plans[] = \App\Models\Plan::find($id);
		}

		if(empty($plans)){
			return view('no-plans')->with('service', $service)->with('ldc', $ldc);
		}

		return view('internal-enrollments.plans-findex')->with('plans', $plans);
	}


	/**
	 * Display a listing of the Plan.
	 */
	public function index()
	{
		$plans = \App\Models\Plan::paginate(15);

		return view('plans.index')
				->with('plans', $plans);
	}

	
	/**
	 * For admin portal
	 * Sort plans by chosen column
	 */
	public function sortPlans($column){

		$plans = \App\Models\Plan::orderBy($column)->paginate(15);

		return view('plans.index')
				->with('plans', $plans);
	}


	/**
	 * Show the form for creating a new Plan.
	 */
	public function create()
	{
		return view('plans.create');
	}

	
	/**
	 * Store a newly created Plan in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		
		$this->validate($request, [
			'priority'        => 'required',
			'name'            => 'required',
			'ldc'             => 'required',
			'type'            => 'required',
			'length'          => 'required',
			'rate'            => 'required',
			'etf'             => 'required',
			'etf_description' => 'required'
		]);
		
		// null values are needed to tell if plan is step,promo,p2c, or opsolve
		if($input['rate2'] === ''){
			$input['rate2'] = null;
		}
		if($input['promo'] === ''){
			$input['promo'] = null;
		}
		if($input['code'] === ''){
			$input['code'] = null;
		}
		if($input['price_code'] === ''){
			$input['price_code'] = null;
		}

		\App\Models\Plan::Create($input);

		Flash::success('Plan saved successfully.');

		return redirect('plans');
	}

	
	/**
	 * Display the specified Plan.
	 */
	public function show($id)
	{
		$plan = \App\Models\Plan::find($id);

		if(empty($plan))
		{
			Flash::error('Plan not found');

			return redirect('plans');
		}

		return view('plans.show')->with('plan', $plan);
	}

	
	/**
	 * Show the form for editing the specified Plan.
	 */
	public function edit($id)
	{
		$plan = \App\Models\Plan::find($id);

		if(empty($plan))
		{
			Flash::error('Plan not found');

			return redirect(route('plans.index'));
		}

		return view('plans.edit')->with('plan', $plan);
	}

	
	/**
	 * Update the specified Plan in storage.
	 */
	public function update($id, Request $request)
	{
		$plan = \App\Models\Plan::find($id);

		if(empty($plan))
		{
			Flash::error('Plan not found');

			return redirect(route('plans.index'));
		}

		$plan->update($request->all());

		Flash::success('Plan updated successfully.');

		return redirect('plans');
	}

	
	/**
	 * Remove the specified Plan from storage.
	 */
	public function destroy($id)
	{
		$plan = \App\Models\Plan::find($id);

		if(empty($plan))
		{
			Flash::error('Plan not found');

			return redirect(route('plans.index'));
		}

		$plan->delete($id);

		Flash::success('Plan deleted successfully.');

		return redirect('plans');
	}

	
	/**
	 * Make SOAP call to retrieve current plans for LDC
	 * Parse SOAP response and format for web
	 * Insert plans into database
	 */
	public function updateLdcPlans($ldc){		
		$url           = env('SOAP_URL');
		$user          = env('SOAP_USER');
		$pw            = env('SOAP_PW');
		$output_params = array("output_xml;8000");
		$lang          = env('SOAP_LANG');
		$entno         = env('SOAP_ENTNO');
		$client        = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

	    $xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_DR_Price_Quote</proc_type><entno>4270</entno><supno>" . $ldc . "</supno><rev_type>R</rev_type><campaign_code>WEB</campaign_code><request_date>" . date('Y-m-d') . "</request_date></ReadiSystem>]]></string>";

	    $xml_obj = simplexml_load_string($xml_string);

	    $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
	    
	    $response = $client->__getLastResponse(); 
	    $request = $client->__getLastRequest();

	    // explode string into array of plans
	    $xml = explode('&lt;GU_sp_DR_Price_Quote&gt;', $response);
	    // delete first element that is not a plan
	    //unset($xml[0]);

	    // get values from xml tags and add to array
	    for($i = 1; $i < count($xml); $i++){
	        $entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
	        $supno= get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');
	        $price_code = get_string_between($xml[$i], '&lt;price_code&gt;', '&lt;/price_code&gt;');
	        $rev_type = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
	        $offer_price = get_string_between($xml[$i], '&lt;offer_price&gt;', '&lt;/offer_price&gt;');
	        $early_term_type = get_string_between($xml[$i], '&lt;early_term_type&gt;', '&lt;/early_term_type&gt;');
	        $early_term_amt = get_string_between($xml[$i], '&lt;early_term_amt&gt;', '&lt;/early_term_amt&gt;');
	        $offer_term = get_string_between($xml[$i], '&lt;offer_term&gt;', '&lt;/offer_term&gt;');
	        $price_id = get_string_between($xml[$i], '&lt;price_id&gt;', '&lt;/price_id&gt;');


	        $plans[] = array(
	        				'priority'		              => '0',
	        				'name'			              => 'Fixed',
	                        'ldc'                         => $supno, 
	                        'type'                        => $rev_type, 
	                        'length'                      => $offer_term,
	                        'rate'                        => '$' . substr($offer_price, 0, 6) . '/kWh',
	                        'etf'						  => $early_term_amt,
	                        'etf_description'             => $early_term_type,
	                        'price_code'                  => $price_code
	                    );
	    }

	    foreach($plans as $plan){
	    	if($plan['ldc'] === 'DUKE_OH'){
	    		$plan['ldc'] = 'Duke';
	    	}
	    	if($plan['etf_description'] === 'FIXED'){
	        	$plan['etf_description'] = 'Flat fee of ' . '$' . $plan['etf'] . ' for early cancellation.';
	        	$plan['etf'] = 'Early Cancellation Fee';
	        }
	        else if($plan['etf_description'] === 'TERM' || $plan['etf_description'] === 'REDUC' && $plan['etf'] !== ''){
	        	$plan['etf_description'] = '$' . $plan['etf'] . ' per month remaining on the contract.';
	        	$plan['etf'] = 'Cancellation Fee Applies';
	        }
	        else{
	        	$plan['etf_description'] = 'No fee for terminating the contract early.';	
	        	$plan['etf'] = 'No Early Cancellation Fee';        	
	        }
	    	if($plan['type'] === 'R'){
	    		$plan['type'] = 'Residential';
	    	}
	    	else{
	    		$plan['type'] = 'Commercial';
	    	}

	    	$p = \App\Models\Plan::create($plan);
	    }
	}


	/**
	 * Delete all Opsolve plans from database
	 * Update plans for each utility
	 * Redirect to home page
	 */
	public function updatePlans(){
		\App\Models\Plan::whereNull('code')->delete();

		//$this->updateLdcPlans('BGE');

		//$this->updateLdcPlans('Delmarva');
		//$this->updateLdcPlans('Duquesne');

		/*$this->updateLdcPlans('METED');
		$this->updateLdcPlans('PECO');
		$this->updateLdcPlans('PEPCO');
		$this->updateLdcPlans('PPL');*/

		$this->updateLdcPlans('DUKE_OH');
	    
	    return redirect('/');
	    //return view('soap-test')->with('plans', $plans)->with('request', $request);
		}
}
