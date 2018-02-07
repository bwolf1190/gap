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
			$price_desc = get_string_between($xml[$i], '&lt;price_desc&gt;', '&lt;/price_desc&gt;');
			$offer_price = get_string_between($xml[$i], '&lt;offer_price&gt;', '&lt;/offer_price&gt;');
			$early_term_type = get_string_between($xml[$i], '&lt;early_term_type&gt;', '&lt;/early_term_type&gt;');
			$early_term_amt = get_string_between($xml[$i], '&lt;early_term_amt&gt;', '&lt;/early_term_amt&gt;');
			$offer_term = get_string_between($xml[$i], '&lt;offer_term&gt;', '&lt;/offer_term&gt;');
			$price_id = get_string_between($xml[$i], '&lt;price_id&gt;', '&lt;/price_id&gt;');
			$campaign_code = get_string_between($xml[$i], '&lt;campaign_code&gt;', '&lt;/campaign_code&gt;');

			// name of plan (Fixed or Introductory Variable)
			if(strpos($price_desc, 'V') || $offer_term == '1'){
				$name = 'Introductory Variable';
			}
			else{ $name = 'Fixed'; }

			// set opsolve supno as plan code
			$code = $supno;

			// set plan ldc based on opsolve supno
			if($supno == 'BGE'){ $ldc = 'BGE'; }
			if($supno == 'DELMD'){ $ldc = 'Delmarva'; }
			if($supno == 'DUKE_OH'){ $ldc = 'Duke'; }
			if($supno == 'DQE'){ $ldc = 'Duquesne'; }
			if($supno == 'METED'){ $ldc = 'MetEd'; }
			if($supno == 'PECO'){ $ldc = 'PECO'; }
			if($supno == 'PEPCO_MD'){ $ldc = 'PEPCO'; }
			if($supno == 'PPL'){ $ldc = 'PPL'; }

			//set plan type based on opsolve rev_type
			if($rev_type == 'R'){ $type = 'Residential'; }
			else{ $type = 'Commercial'; }

			//set length equal to opsolve offer_term
			$length = $offer_term;

			//format rate from opsolve offer_price
			$rate = '$' . substr($offer_price, 0, 6) . '/kWh';

			//set reward info from opsolve price_desc
			if(strpos($price_desc, 'SRW100')){
				$reward = 'Shopping/Dining Rewards';
				$reward_link = 'https://www.greatamericanpowerrewards.com/';
				$reward_description = '$100 Per Month Shopping/Dining Rewards';
			}
			else if(strpos($price_desc, 'SRW25')){
				$reward = 'Shopping/Dining Rewards';
				$reward_link = 'https://www.greatamericanpowerrewards.com/';
				$reward_description = '$25 Per Month Shopping/Dining Rewards';
			}

			else if(strpos($price_desc, 'SRW500/100') || strpos($price_desc, '500/100')){
				$reward = 'Shopping/Dining Rewards';
				$reward_link = 'https://www.greatamericanpowerrewards.com/';
				$reward_description = '$500 Shopping/Dining Rewards for the first month, and $100 for each month remaining on contract.';
			}

			else {
				$reward = 'Safe Streets Rebate';
				$reward_link = 'http://www.safestreets.com/GAP1/';
				$reward_description = 'Receive a $100 rebate from Great American Power AND a $100 rebate for signing up with our Home Security partners, Safe Streets (an authorized dealer of ADT security systems)';
			}

			//set etf info from opsolve early_term_type and early_term_amt
			if($early_term_amt == '0.00'){
				$etf = 'No Early Exit Fee Applies';
				$etf_description = 'No Early Exit Fee Applies';
			}
			else if($early_term_type === 'FIXED'){
				$etf = 'Early Exit Fee Applies';
				$etf_description = 'Flat fee of ' . '$' . $early_term_amt . ' for early cancellation.';
			}
			else{
				$etf = 'Early Exit Fee Applies';
				$etf_description = '$10' . ' per month remaining on the contract; Not to exceed $' . $early_term_amt;
			}
			//set daily fee info using opsolve price_desc
			if(strpos($price_desc, 'F.50') || strpos($price_desc, 'Fee.50') || strpos($price_desc, 'F0.5') || strpos($price_desc, 'F50')){
				$daily_fee = 'Daily Fee Applies';
				$daily_fee_description = '$0.50 per day';
			}
			else if(strpos($price_desc, 'Fee .25') || strpos($price_desc, 'F25')){
				$daily_fee = 'Daily Fee Applies';
				$daily_fee_description = '$0.25 per day';
			}
			else if(strpos($price_desc, 'F1 ')){
				$daily_fee = 'Daily Fee Applies';
				$daily_fee_description = '$1.00 per day';
			}
			else{
				$daily_fee = null;
				$daily_fee_description = null;
			}
			
			// set meter using opsolve price_desc
			if(strpos($price_desc, 'G1')){
				$meter = 'GS1';
			}
			else{$meter = null;}

			//set promo using opsolve price_desc
			if((strpos($price_desc, 'B') || strpos($price_desc, 'BROKER')) && (!strpos($price_desc, 'WEB'))){
					$promo = 'BROKER';
			}
			if(strpos($price_desc, 'WMS003')){
				$promo = 'WMS';
			}
			//else if(strpos($price_desc, 'MYENERGY_004')){
			if(strpos($price_desc, 'MY') || strpos($)){
			
				$promo = 'MYENERGY';
			}
			if(strpos($price_desc, 'Email') || strpos($price_desc, 'ES5_100F50')){
				$promo = 'GAP';
			}
			else { $promo = null; }

			//if(strpos($campaign_code, 'WEB')) { $promo = null; }
			
			//create plan
			$plan = ['priority' => '0', 
				'name'                  => $name, 
				'ldc'                   => $ldc, 
				'type'                  => $type, 
				'length'                => $offer_term, 
				'rate'                  => $rate, 
				'reward'                => $reward, 
				'reward_link'           => $reward_link, 
				'reward_description'    => $reward_description, 
				'etf'                   => $etf, 
				'etf_description'       => $etf_description, 
				'daily_fee'             => $daily_fee,
				'daily_fee_description' => $daily_fee_description,
				'meter'		=> $meter,
				'promo'                 => $promo,
				'campaign_code' => $campaign_code,
				'code'                  => $code,
				'price_code'            => $price_code];

			\App\Models\Plan::create($plan);
		}

	}


	/**
	 * Delete all Opsolve plans from database
	 * Update plans for each utility
	 * Redirect to home page
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
