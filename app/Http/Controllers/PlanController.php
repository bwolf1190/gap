<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Debugbar;
use SoapClient;
use Response;
use Session;
use Flash;


class PlanController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['searchPlans', 'internalPlans', 'truncate', 'updatePlans']]);
    }

	public function searchPlans($type, $service, $ldc, $promo = null){
		// return plans that match service and ldc
		// ordered by rate to display the larger step plans and LMF plans together
		if($promo === null){
			$ps = \App\Models\Plan::orderBy('rate', 'desc')->where('ldc', $ldc)->where('type', $service)->get();
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

	public function internalPlans($service, $ldc){
		// return plans that match service and ldc
		// ordered by rate to display the larger step plans and LMF plans together

		$ps = \App\Models\Plan::orderBy('rate', 'desc')->where('ldc', $ldc)->where('type', $service)->get();
		
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
	 *
	 * @return Response
	 */
	public function index()
	{

		//$user = DB::table('users')->first();
		//$token = $user->token;
		//$session = Session::get('token');
		$plans = \App\Models\Plan::paginate(15);

		return view('plans.index')
				->with('plans', $plans);

	}

	public function sortPlans($column){

		$plans = \App\Models\Plan::orderBy($column)->paginate(15);

		return view('plans.index')
				->with('plans', $plans);
	}

	/**
	 * Show the form for creating a new Plan.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('plans.create');
	}

	/**
	 * Store a newly created Plan in storage.
	 *
	 * @param CreatePlanRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		\App\Models\Plan::Create($input);

		Flash::success('Plan saved successfully.');

		return redirect('plans');
	}

	/**
	 * Display the specified Plan.
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int              $id
	 * @param UpdatePlanRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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

	public function truncate(){
		
	}

	public function updateLdcPlans($ldc){
		\App\Models\Plan::truncate();
		
		$url = env('SOAP_URL');
	    $user = env('SOAP_USER');
	    $pw = env('SOAP_PW');
	    $output_params = array("output_xml;8000");
	    $lang = env('SOAP_LANG');
	    $entno = env('SOAP_ENTNO');
	    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

	    $xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_DR_Price_Quote</proc_type><entno>4270</entno><supno>" . $ldc . "</supno><rev_type>R</rev_type><campaign_code>WEB</campaign_code><request_date>2016-05-01</request_date></ReadiSystem>]]></string>";

	    $xml_obj = simplexml_load_string($xml_string);

	    $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
	    

	    $response = $client->__getLastResponse(); 
	    $request = $client->__getLastRequest();

	    // explode string into array of plans
	    $xml = explode('&lt;GU_sp_DR_Price_Quote&gt;', $response);
	    // delete first element that is not a plan
	    unset($xml[0]);

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
	                        'rate'                        => '$' . $offer_price,
	                        'etf'						  => $early_term_amt,
	                        'etf_description'             => $early_term_type,
	                        'price_code'                  => $price_code
	                    );
	    }

	    foreach($plans as $plan){
	    	if($plan['etf_description'] === 'FIXED'){
	        	$plan['etf_description'] = 'Flat fee of ' . '$' . $plan['etf'] . ' for early cancellation.';
	        	$plan['etf'] = 'Early Termination Fee';
	        }
	        else if($plan['etf_description'] === 'TERM' && $plan['etf'] !== ''){
	        	$plan['etf_description'] = '$' . $plan['etf'] . ' per month remaining on the contract.';
	        	$plan['etf'] = 'Early Termination Fee';
	        }
	        else{
	        	$plan['etf_description'] = 'No fee for terminating the contract early.';	
	        	$plan['etf'] = 'No Early Termination Fee';        	
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



	public function updatePlans(){
		Debugbar::startMeasure('render','Time for rendering');
		Debugbar::stopMeasure('render');
		Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
		Debugbar::measure('My long operation', function() {
			$this->truncate();
			$this->updateLdcPlans('BGE');
			//$this->updateLdcPlans('Delmarva');
			//$this->updateLdcPlans('Duquesne');
			$this->updateLdcPlans('METED');
			$this->updateLdcPlans('PECO');
			$this->updateLdcPlans('PEPCO');
			$this->updateLdcPlans('PPL');
		});
	    
	    return $this->index();
	    //return view('soap-test')->with('plans', $plans)->with('request', $request);
		}
}
