<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Flash;
use Mail;
use SoapClient;


class EmailController extends Controller
{

  public function sendWelcome($customer){
    $customer = \App\Models\Customer::where('id',$customer)->first();
    $plan = \App\Models\Plan::where('id', $customer->plan_id)->first();
    $enrollment = \App\Models\Enrollment::where('customer_id', $customer->id)->first();
    $url = env('SOAP_URL');
    $user = env('SOAP_USER');
    $pw = env('SOAP_PW');
    $output_params = array("output_xml;8000");
    $lang = env('SOAP_LANG');
    $entno = env('SOAP_ENTNO');
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

    // offers by zip soap call for testing
    //$xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>RS_sp_DR_Offers_by_Zip</proc_type><entno>4271</entno><zip>45003</zip><rev_type>R</rev_type><utility_type>E</utility_type></ReadiSystem>]]></string>";
    
    // prioce quote call for testing
    $xml_string = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_DR_Price_Quote</proc_type><entno>4271</entno><supno>DUKE_OH</supno><rev_type>R</rev_type><campaign_code>WEB</campaign_code><request_date>2016-05-01</request_date></ReadiSystem>]]></string>";


    //$xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4271</entno><supno>DUKE_OH</supno><eu_acct_no>" . $customer->acc_num . "</eu_acct_no><gu_acct_no></gu_acct_no><price_code>12775</price_code><rev_type>R</rev_type><last_name>" . $customer->lname . "</last_name><first_name>" . $customer->fname . "</first_name><main_phone>" . $customer->phone . "</main_phone><cell_phone>" . $customer->phone . "</cell_phone><email>" . $customer->email . "</email><street_addr>" . $customer->sa1 . "</street_addr><street_addr2>" . $customer->sa2 . "</street_addr2><city>" . $customer->scity . "</city><state_abbr>OH</state_abbr><postal>" . $customer->szip . "</postal><referral_id></referral_id><response_ind>Y</response_ind><campaign_code>WEB</campaign_code><eai_trnno>" . $customer->id . "</eai_trnno></ReadiSystem>]]></string>";
    //$xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4271</entno><supno>DUKE_OH</supno><eu_acct_no>321321</eu_acct_no><gu_acct_no></gu_acct_no><price_code>12775</price_code><rev_type>R</rev_type><last_name>lname</last_name><first_name>fname</first_name><main_phone>phone</main_phone><cell_phone>phone</cell_phone><email>email</email><street_addr>sa1</street_addr><street_addr2>sa2</street_addr2><city>scity</city><state_abbr>OH</state_abbr><postal>szip</postal><referral_id></referral_id><response_ind>Y</response_ind><campaign_code>WEB</campaign_code><eai_trnno>1233333215</eai_trnno></ReadiSystem>]]></string>";

    $xml_obj = simplexml_load_string($xml_string); 

    $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 

    $ac_response_str = $client->__getLastResponse();

    // for testing soap response
    return view('soap-test')->with('xml_string', $xml_string)->with('response', $ac_response_str);

    Mail::send('emails.welcome', ['customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment], function ($m) use ($customer, $plan, $enrollment) {
            $m->from('enroll@perigeeenergy.com', 'GAP');
            $m->to($customer->email);
            $m->subject("Email Confirmation");
    });


    return view('emails.welcome-landing')->with('customer', $customer)->with('plan', $plan);

  }

  public function confirmEmail($customer, $confirmation_code){

    $enrollment = \App\Models\Enrollment::where('customer_id', $customer)->first();
    $customer = \App\Models\Customer::where('id', $customer)->first();

    // email has already been confirmed
    if($enrollment->confirm_date != 'NULL'){
      return view('emails.already-confirmed')->with('cd', $enrollment->confirm_date);
    }
    else if($confirmation_code === $enrollment->confirmation_code){
          $enrollment->update(['confirm_date' => date("Y-m-d H:i:s")]);
        
          return view('emails.confirmation')
            ->with('customer', $customer)->with('confirmation_code', $confirmation_code);
    }
    else{
      return view('welcome');
    }

  }

public function sendSoapEnrollment($customer, $enrollment){
    $url = env('SOAP_URL');
    $user = env('SOAP_USER');
    $pw = env('SOAP_PW');
    $output_params = array("output_xml;8000");
    $lang = env('SOAP_LANG');
    $entno = env('SOAP_ENTNO');
    $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

    $xml_string  = "<web:string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4271</entno>";
    $xml_string .= "<supno>DUKE_OH</supno><eu_acct_no>100000012</eu_acct_no><gu_acct_no></gu_acct_no><price_code>12775</price_code><rev_type>R</rev_type>";
    $xml_string .= "<last_name>" . $customer->lname . "</last_name>";
    $xml_string .= "<first_name>" . $customer->fname . "</first_name>";  
    $xml_string .= "<main_phone>9375439828</main_phone>";  
    $xml_string .= "<cell_phone>9374247500</cell_phone>";  
    $xml_string .= "<email>ssonth@opsolve.com</email>";  
    $xml_string .= "<street_addr>4880 Springfield Dr.</street_addr>";  
    $xml_string .= "<street_addr2>Apt 5</street_addr2>";  
    $xml_string .= "<city>Dayton</city>";  
    $xml_string .= "<state_abbr>OH</state_abbr>";  
    $xml_string .= "<postal>45431</postal>";  
    $xml_string .= "<referral_id></referral_id>";  
    $xml_string .= "<response_ind>Y</response_ind>";  
    $xml_string .= "<campaign_code>WEB</campaign_code>";  
    $xml_string .= "<eai_trnno>66666</eai_trnno>";  
    $xml_string .= "</ReadiSystem>]]></web:string>";
    
    $xml_obj = simplexml_load_string($xml_string); 

    $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Output", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 

    $ac_response_str = $client->__getLastResponse();
    $ac_response_str = htmlspecialchars_decode($ac_response_str);
    //$ac_response_arr = explode('</', $ac_response_str);

    return view('emails.soap-test')->with('response', $ac_response_str);

}




}

