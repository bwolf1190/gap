<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $su = DB::table('welcome')->where('id', 1)->value('sign-up-now');
        $aws = DB::table('welcome')->where('id', 1)->value('areas-we-serve');
        $wwd = DB::table('welcome')->where('id', 1)->value('what-we-do');
        $en = DB::table('welcome')->where('id', 1)->value('enroll-now');
        $lm = DB::table('welcome')->where('id', 1)->value('learn-more');
        $cs = DB::table('welcome')->where('id', 1)->value('contact-us');
        $p = DB::table('welcome')->where('id', 1)->value('phone');
        $e = DB::table('welcome')->where('id', 1)->value('email');

        return view('welcome')->with('su', $su)
                                ->with('aws', $aws)
                                ->with('wwd', $wwd)
                                ->with('en', $en)
                                ->with('lm', $lm)
                                ->with('cs', $cs)
                                ->with('p', $p)
                                ->with('e', $e);
    }
}
