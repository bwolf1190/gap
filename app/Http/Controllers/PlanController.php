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
        $this->middleware('admin', ['except' => ['searchPlans', 'searchMeteredPlans','internalPlans', 'truncate']]);
    }

    public function searchMeteredPlans($type, $service, $ldc, $meter = null){
    	$type = 'web';
    	$promo=null;

    	if($meter != null){
    		$ps = \App\Models\Plan::orderBy('priority', 'asc')->where('ldc', $ldc)->where('type', $service)->where('meter', $meter)->whereNull('promo')->get();
    	}

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
	 * Return plans for type, service, ldc, and the optional promo.
	 * If no plans exist, then redirect to modal with message.
	 */
	public function searchPlans($type, $service, $ldc, $promo = null){
		// return plans that match service and ldc
		// ordered by rate to display the larger step plans and LMF plans together
		if($promo === null){
			$ps = \App\Models\Plan::orderBy('priority', 'asc')->where('ldc', $ldc)->where('type', $service)->whereNull('promo')->get();
		}
		else{
			$ps = \App\Models\Plan::orderBy('priority', 'asc')->where('ldc', $ldc)->where('type', $service)->where('promo', $promo)->get();
		}
		
		$zip = Input::get('zip');

		foreach($ps as $p){
			$id = $p->id;
			$plans[] = \App\Models\Plan::find($id);
		}

		if(empty($plans)){
			return view('no-plans')->with('service', $service)->with('ldc', $ldc);
		}
		// only 1 plan with this criteria, so go straight to sign up form
		else if(count($plans) == 1){
			return redirect()->route('start', ['id' => $plans[0]->id, 'promo' => $promo, 'type' => $type]);
		}

		return view('plans.findex')->with('plans', $plans)->with('promo', $promo)->with('type', $type);
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
		
		// null values are needed to tell if plan is promo,p2c, or opsolve
		if($input['rate2'] === ''){
			$input['rate2'] = null;
		}
		if($input['promo'] === ''){
			$input['promo'] = null;
		}
		if($input['code'] === ''){
			$input['code'] = null;
		}
		if($input['price_code'] === '' || $input['price_code'] == '0'){
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

		$pr = $request->all();
		if($pr['rate2'] == ''){
			$pr['rate2'] = null;
		}
		if($pr['price_code'] == '' || $pr['price_code'] == '0'){
			$pr['price_code'] = null;
		}
		if($pr['meter'] == ''){
			$pr['meter'] = null;
		}
		if($pr['promo'] == ''){
			$pr['promo'] = null;
		}
		if($pr['reward'] == ''){
			$pr['reward'] = null;
			$pr['reward_link'] = null;
			$pr['reward_description'] = null;
		}
		$plan->update($pr);

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

		$plan->delete();

		Flash::success('Plan deleted successfully.');

		return redirect('plans');
	}

	
	/**
	 * Make SOAP call to retrieve current plans for LDC
	 * Parse SOAP response and format for web
	 * Insert plans into database
	 */
	public function updateLdcPlans($ldc, $service){	
		$url           = env('SOAP_URL');
		$user          = env('SOAP_USER');
		$pw            = env('SOAP_PW');
		$output_params = array("output_xml;8000");
		$lang          = env('SOAP_LANG');
		$entno         = env('SOAP_ENTNO');
		$client        = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

		$xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_DR_Price_Quote</proc_type><entno>4270</entno><supno>" . $ldc . "</supno><rev_type>" . $service . "</rev_type><campaign_code></campaign_code><request_date>" . date('Y-m-d') . "</request_date></ReadiSystem>]]></string>";
		$xml_obj = simplexml_load_string($xml_string);

		$client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
	    
		$response = $client->__getLastResponse(); 
		$request = $client->__getLastRequest();

		// no plans for this ldc/service combo. create plans array with empty values
		if($request = '<?xml version="1.0" encoding="UTF-8"?>\n<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://www.opsolve.com/RS/webservices/"><SOAP-ENV:Body><ns1:ExecuteSP><ns1:user>gp_WebSales</ns1:user><ns1:password>G@Pa$$99!!</ns1:password><ns1:spName>RS_sp_EAI_Output</ns1:spName><ns1:paramList><ns1:string>@input_xml;&lt;ReadiSystem&gt;&lt;proc_type&gt;GU_sp_DR_Price_Quote&lt;/proc_type&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;supno&gt;DQE&lt;/supno&gt;&lt;rev_type&gt;C&lt;/rev_type&gt;&lt;campaign_code&gt;WEB&lt;/campaign_code&gt;&lt;request_date&gt;2017-10-31&lt;/request_date&gt;&lt;/ReadiSystem&gt;</ns1:string></ns1:paramList><ns1:outputParamList><ns1:string>output_xml;8000</ns1:string></ns1:outputParamList><ns1:langCode>en-us</ns1:langCode><ns1:entity>4270</ns1:entity></ns1:ExecuteSP></SOAP-ENV:Body></SOAP-ENV:Envelope>\n'){
			$plans = array('priority' => '', 'name' => '', 'ldc' => '', 'type' => '', 'length' => '', 'rate' => '', 'reward' => '', 'reward_link'  => '', 'reward_description' => '', 'etf' => '', 'etf_description' => '', 'price_code' => '');
		}
	
		// explode string into array of plans
		$xml = explode('&lt;GU_sp_DR_Price_Quote&gt;', $response);
		// delete first element that is not a plan
		//unset($xml[0]);
		//dd(count($xml));
		//$plans = array();
		// get values from xml tags and add to array
		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], "&lt;entno&gt;", "&lt;/entno&gt;");
			$supno= get_string_between($xml[$i], "&lt;supno&gt;", "&lt;/supno&gt;");
			$price_code = get_string_between($xml[$i], "&lt;price_code&gt;", "&lt;/price_code&gt;");
			$rev_type = get_string_between($xml[$i], "&lt;rev_type&gt;", "&lt;/rev_type&gt;");
			//$price_desc = get_string_between($xml[$i], "&lt;price_desc&gt;", "&lt;/price_desc&gt;");
			$offer_price = get_string_between($xml[$i], "&lt;offer_price&gt;", "&lt;/offer_price&gt;");
			$early_term_type = get_string_between($xml[$i], "&lt;early_term_type&gt;", "&lt;/early_term_type&gt;");
			$early_term_amt = get_string_between($xml[$i], "&lt;early_term_amt&gt;", "&lt;/early_term_amt&gt;");
			$offer_term = get_string_between($xml[$i], "&lt;offer_term&gt;", "&lt;/offer_term&gt;");
			$price_id = get_string_between($xml[$i], "&lt;price_id&gt;", "&lt;/price_id&gt;");
			
			if($early_term_type == 'FIXED' && $early_term_amt !== '0.00'){
				$etf_description = 'Flat fee of $' . $early_term_amt . ' for early cancellation.';
				$early_term_type = 'Cancellation Fee Applies'; 
			}

			else if($early_term_type == 'REDUC' || $early_term_type == 'TERM'){
				$etf_description = '$' . $early_term_amt . ' per month remaining on contract.';
				$early_term_type = 'Cancellation Fee Applies'; 
			}

			else{
				$etf_description = 'No fee for terminating the contract early.';
				$early_term_type = 'No Early Cancellation Fee';
			}

			//$plans = array('priority' => '0', 'name' => 'Fixed', 'ldc' => $supno, 'type' => $rev_type, 'length' => $offer_term, 'rate' => '$' . substr($offer_price, 0, 6) . '/kWh', 'reward' => '', 'reward_link'	 => '', 'reward_description' => '', 'etf' => $early_term_amt, 'etf_description' => $etf_description, 'price_code' => $price_code);
			$plans = array('priority' => '0', 'name' => 'Fixed', 'ldc' => $supno, 'type' => $rev_type, 'length' => $offer_term, 'rate' => '$' . substr($offer_price, 0, 6) . '/kWh', 'reward' => '', 'reward_link'  => '', 'reward_description' => '', 'etf' => $early_term_type, 'etf_description' => $etf_description, 'price_code' => (int)$price_code);
			//$plans['priority' ,'name', 'ldc', 'type', 'length', 'rate', 'reward', 'reward_link', 'reward_description', 'etf', 'etf_description', 'price_code'] = ['0', 'Fixed', $supno, $rev_type, $offer_term, '$' . substr($offer_price, 0, 6) . '/kWh', '', '', '', $early_term_amt, $etf_description, (int)$price_code];
		}
		
		//dd($plans);

		foreach($plans as $key => $val){
			$input[$key] = $val;
			if($key == 'ldc' && $input[$key] == 'DUKE_OH'){
				$input['ldc'] = 'Duke';
			}
			if($key == 'ldc' && $input[$key] == 'DELMD'){
				$input['ldc'] = 'Delmarva';
			}
			if($key == 'ldc' && $input[$key] == 'DQE'){
				$input['ldc'] = 'Duquesne';
			}
			if($key == 'ldc' && $input[$key] == 'PEPCO_MD'){
				$input['ldc'] = 'PEPCO';
			}
			if($key == 'length' && $input[$key] == '1'){
				$input['name'] = 'Variable';		
			}
			if($input[$key] == 'R'){ $input[$key] = 'Residential'; }
			if($input[$key] == 'C'){ $input[$key] = 'Commercial'; }

			// only add plans that have all information
			if($key == 'price_code' && $val !== 0){
				$p = \App\Models\Plan::create($input);
			}
		}
	}


	/**
	 * Delete all Opsolve plans from database
	 * Update plans for each utility
	 * Redirect to plans page
	 */
	public function updatePlans(){
		\App\Models\Plan::truncate();

		$this->updateLdcPlans('BGE', 'R');
		$this->updateLdcPlans('BGE', 'C');

		$this->updateLdcPlans('DELMD', 'R');
		$this->updateLdcPlans('DELMD', 'C');
		
		$this->updateLdcPlans('DUKE_OH', 'R');
		$this->updateLdcPlans('DUKE_OH', 'C');
		
		$this->updateLdcPlans('DQE', 'R');
		$this->updateLdcPlans('DQE', 'C');
 
		$this->updateLdcPlans('METED', 'R');
		$this->updateLdcPlans('METED', 'C');
		
		$this->updateLdcPlans('PECO', 'R');
		$this->updateLdcPlans('PECO', 'C');
		
		$this->updateLdcPlans('PEPCO_MD', 'R');
		$this->updateLdcPlans('PEPCO_MD', 'C');

		$this->updateLdcPlans('PPL', 'R');
		$this->updateLdcPlans('PPL', 'C');

		return redirect('/plans');
	}
}
