<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;


class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['create', 'store']]);
    }


	/**
	 * Display a listing of the contact.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = \App\Models\Contact::paginate(15);
		return view('contacts.index')->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new contact.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contacts.create');
	}

	/**
	 * Store a newly created contact in storage.
	 *
	 * @param CreatecontactRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$contact = \App\Models\Contact::Create($input);
		$contact->status = 'OPEN';
		$contact->save();

		Flash::success('contact saved successfully.');

		return redirect('/');
	}

	/**
	 * Display the specified contact.
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
	 *
	 * @param  int              $id
	 * @param UpdatecontactRequest $request
	 *
	 * @return Response
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
	 *
	 * @param  int $id
	 *
	 * @return Response
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
