<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        $this->middleware('auth', ['except' => ['searchPlans']]);
    }

	public function searchPlans($service, $ldc, $promo = null){
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

		return view('plans.findex')->with('plans', $plans)->with('promo', $promo);
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

		//if($token === $session){
			return view('plans.index')
				->with('plans', $plans);
		/*}
		else{
			return redirect('login');
		}*/

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
}
