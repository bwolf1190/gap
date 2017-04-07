<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Mail\ContactCustomerService;
use Illuminate\Http\Request;
use Response;
use Session;
use Flash;
use Mail;


class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['create', 'store']]);
    }


	/**
	 * Display a listing of the contact.
	 */
	public function index()
	{
		$contacts = \App\Models\Contact::orderBy('id', 'desc')->paginate(15);
		return view('contacts.index')->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new contact.
	 */
	public function create()
	{
		return view('contacts.create');
	}

	/**
	 * Store a newly created contact in storage.
	 */
	public function store(Request $request)
	{
		$input = $request->all();

	    	$this->validate($request, [
	        	'name'   => 'required',
	        	'email'  => 'required|email',
	        	'inquiry'=> 'required'
	    	]);

	    	$input['name'] = title_case(strip_tags($input['name']));
	    	$input['phone'] = strip_tags($input['phone']);
	    	$input['email'] = strip_tags($input['email']);
	    	$input['inquiry'] = strip_tags($input['inquiry']);

		if($input['honey'] === ''){
			$contact = \App\Models\Contact::Create($input);
			$contact->status = 'OPEN';
			$contact->save();
			Flash::success('contact saved successfully.');
			Mail::to('gaponline@greatamericanpower.com')->queue(new ContactCustomerService($input['name'], $input['phone'], $input['email'], $input['inquiry']));
		}


		return redirect('/');
	}

	/**
	 * Display the specified contact.
	 */
	public function show($id)
	{
		$contact = \App\Models\Contact::find($id);

		if(empty($contact))
		{
			Flash::error('contact not found');

			return redirect('contacts');
		}

		return view('contacts.show')->with('contact', $contact);
	}

	/**
	 * Show the form for editing the specified contact.
	 */
	public function edit($id)
	{
		$contact = \App\Models\Contact::find($id);

		if(empty($contact))
		{
			Flash::error('contact not found');

			return redirect(route('contacts.index'));
		}

		return view('contacts.edit')->with('contact', $contact);
	}

	/**
	 * Update the specified contact in storage.
	 */
	public function update($id, Request $request)
	{
		$contact = \App\Models\Contact::find($id);

		if(empty($contact))
		{
			Flash::error('contact not found');

			return redirect(route('contacts.index'));
		}

		$contact->update($request->all());

		Flash::success('contact updated successfully.');

		return redirect('contacts');
	}

	/**
	 * Remove the specified contact from storage.
	 */
	public function destroy($id)
	{
		$contact = \App\Models\Contact::find($id);

		if(empty($contact))
		{
			Flash::error('contact not found');

			return redirect(route('contacts.index'));
		}

		$contact->delete($id);

		Flash::success('contact deleted successfully.');

		return redirect('contacts');
	}
}
