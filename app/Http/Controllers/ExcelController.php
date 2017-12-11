<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Response;
use Session;
use Flash;
use Mail;
use DB;

class ExcelController extends Controller
{
 	public function __construct(){

        		$this->middleware('admin');
 	}

 	public function exportCustomers(){
 		$promo = \Auth::user()->name;
 		$customers = \App\Models\Customer::where('promo', $promo)->first();

 		dd($customers->getPlanDescription());
 	}
}
