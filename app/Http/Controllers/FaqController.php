<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class FaqController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['view']]);
    }

    public function view(){
		$faqs = \App\Models\Faq::paginate(30);
		return view('faqs.index')->with('faqs', $faqs);
    }

	/**
	 * Display a listing of the faq.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faqs = \App\Models\Faq::paginate(30);
		return view('faqs.admin')->with('faqs', $faqs);
	}

	/**
	 * Show the form for creating a new faq.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('faqs.create');
	}

	/**
	 * Store a newly created faq in storage.
	 *
	 * @param CreatefaqRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		\App\Models\Faq::Create($input);

		Flash::success('faq saved successfully.');

		return redirect('faqs');
	}

	/**
	 * Display the specified faq.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$faq = \App\Models\Faq::find($id);

		if(empty($faq))
		{
			Flash::error('faq not found');

			return redirect('faqs');
		}

		return view('faqs.show')->with('faq', $faq);
	}

	/**
	 * Show the form for editing the specified faq.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$faq = \App\Models\Faq::find($id);

		if(empty($faq))
		{
			Flash::error('faq not found');

			return redirect(route('faqs.index'));
		}

		return view('faqs.edit')->with('faq', $faq);
	}

	/**
	 * Update the specified faq in storage.
	 *
	 * @param  int              $id
	 * @param UpdatefaqRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$faq = \App\Models\Faq::find($id);

		if(empty($faq))
		{
			Flash::error('faq not found');

			return redirect(route('faqs.index'));
		}

		$faq->update($request->all());

		Flash::success('faq updated successfully.');

		return redirect('faqs');
	}

	/**
	 * Remove the specified faq from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$faq = \App\Models\Faq::find($id);

		if(empty($faq))
		{
			Flash::error('faq not found');

			return redirect(route('faqs.index'));
		}

		$faq->delete($id);

		Flash::success('faq deleted successfully.');

		return redirect('faqs');
	}
}
