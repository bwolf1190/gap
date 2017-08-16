<?php namespace App\Http\Controllers;

use App\Mail\BrokerEnrollmentConfirmation;
use Illuminate\Support\Facades\Input;
use App\Mail\EnrollmentConfirmation;  
use Illuminate\Http\Request;
use SoapClient;
use Session;
use Flash;
use Mail;
use DB;


class EmailController extends Controller
{  
    
    /**
     * Send the welcome email with the confirmation link
     * Execute SOAP call to send enrollment to OPSOLVE
     */
    //public function sendWelcome($customer){
    public function sendWelcome($customer){
        $customer = \App\Models\Customer::where('id',$customer)->first();
        $plan = \App\Models\Plan::where('id', $customer->plan_id)->first();
        $enrollment = \App\Models\Enrollment::where('customer_id', $customer->id)->first();

        // if the enrollment is null, then it must be an InternalEnrollment
        if(is_null($enrollment)){
            $enrollment = \App\Models\InternalEnrollment::where('customer_id', $customer->id)->first();
        }

        return view('emails.welcome-landing')->with('customer', $customer)->with('plan', $plan);
    }

    public function fireWelcomeEmail(Request $request){
        Session::forget('zip');
        Session::forget('state');
        $customer_id = $request['customer_id'];
        $customer = \App\Models\Customer::where('id',$customer_id)->first();
        $plan = \App\Models\Plan::where('id', $customer->plan_id)->first();
        $enrollment = \App\Models\Enrollment::where('customer_id', $customer->id)->first();
        //Mail::to($customer->email)->bcc('greatampower@gmail.com', 'GAP')->mail(new EnrollmentConfirmation($customer, $plan, $enrollment));

        // for sending confirmation email to brokers
        $broker = $enrollment->agent_code;

        if(!empty($broker) && $enrollment->type != 'internal'){
            $this->sendBrokerConfirmation($customer, $plan, $enrollment);
        }

        return redirect('/offers');
    }

    /**
     * Sends a confirmation email to the address stored for the given Broker
     */
    public function sendBrokerConfirmation($customer, $plan, $enrollment){
            $broker = \App\Models\Broker::where('name', $plan->promo)->first();
            //Mail::to($broker->email)->queue(new BrokerEnrollmentConfirmation($customer, $plan, $enrollment));
            Mail::to('bwolverton@greatamericanpower.com')->mail(new BrokerEnrollmentConfirmation($customer, $plan, $enrollment));
    }


    /**
     * Customer has clicked the confirmation link sent in the welcome email
     * Check that the confirmation code in the link matches that of the enrollment
     * Check that email has not already been confirmed
     */
    public function confirmEmail($customer, $confirmation_code){
        // keep customers from completing enrollments
        return view('emails.no-new-customers');
        $enrollment = \App\Models\Enrollment::where('customer_id', $customer)->first();
        $plan = $enrollment->plan;
        $enrollment_p2c = \App\Models\EnrollmentP2C::where('customer_id', $customer)->first();
        $customer = \App\Models\Customer::where('id', $customer)->first();

        // if the enrollment is null, then it must be an InternalEnrollment
        if(is_null($enrollment)){
            $enrollment = \App\Models\InternalEnrollment::where('customer_id', $customer->id)->first();
        }

        // email has already been confirmed
        if($enrollment->confirm_date != 'NULL'){
          return view('emails.already-confirmed')->with('cd', $enrollment->confirm_date);
        }
        else if($confirmation_code === $enrollment->confirmation_code){
                $enrollment->update(['confirm_date' => date("Y-m-d H:i:s"), 'status' => 'CONFIRMED']);
                $enrollment_p2c->update(['status' => 'CONFIRMED']);
                $customer->update(['status' => 'CONFIRMED']);

                if(!(is_null($plan->price_code))){
                    $this->addCustomer($customer, $plan, $enrollment);
                    $this->submitToUtility($customer->id);
                }
            
                return view('emails.confirmation')
                        ->with('customer', $customer)->with('confirmation_code', $confirmation_code);
        }
        else{
            return view('welcome-2');
        }
    }


    /**
     * Create XML to be sent by SOAP call
     */
    public function addCustomer($c, $p, $e){
        $url = env('SOAP_URL');
        $user = env('SOAP_USER');
        $pw = env('SOAP_PW');
        $output_params = array("output_xml;8000");
        $lang = env('SOAP_LANG');
        $entno = env('SOAP_ENTNO');
        $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));
        
        // add agent_id if internal enrollment
        // otherwise agent_id is blank
        if($e->agent_id){
            $agent_id = $e->agent_id;
        }
        else{
            $agent_id = '';
        }

        // OPSOLVE FIX: system needs Residential to be "R" and Commercial to be "C"
        $type = $p->type;
        if($type === "Residential"){
            $type = "R";
        }
        else{
            $type = "C";
        }
        

	/* HARDCODED FOR DUKE_OH LAUNCH */
        
        // change Duke enrollments to 10 digit instead of 11 digit number on their bill
        if($p->ldc == 'Duke'){
            $c->acc_num = substr($c->acc_num, 0, -1);
        }
	
        //$xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4270</entno><supno>" . $p->ldc . "</supno><eu_acct_no>" . $c->acc_num . "</eu_acct_no><gu_acct_no></gu_acct_no><price_code>" . $p->price_code ."</price_code><rev_type>" . $type . "</rev_type><last_name>" . $c->lname . "</last_name><first_name>" . $c->fname . "</first_name><main_phone>" . $c->phone . "</main_phone><cell_phone>" . $c->phone . "</cell_phone><email>" . $c->email . "</email><street_addr>" . $c->sa1 . "</street_addr><street_addr2>" . $c->sa2 . "</street_addr2><city>" . $c->scity . "</city><state_abbr>" . $c->sstate . "</state_abbr><postal>" . $c->szip . "</postal><agent_id>" . $agent_id . "</agent_id><referral_id></referral_id><response_ind>Y</response_ind><campaign_code>WEB</campaign_code><eai_trnno>" . $c->id . "</eai_trnno></ReadiSystem>]]></string>";
        $xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem>
                            <proc_type>GU_sp_XN_Enroll_Add</proc_type>
                            <entno>" . $entno . "</entno>
                            <supno>DUKE_OH</supno>
                            <eu_acct_no>" . $c->acc_num . "</eu_acct_no>
                            <gu_acct_no></gu_acct_no>
                            <price_code>" . $p->price_code ."</price_code>
                            <rev_type>" . $type . "</rev_type>
                            <last_name>" . $c->lname . "</last_name>
                            <first_name>" . $c->fname . "</first_name>
                            <main_phone>" . $c->phone . "</main_phone>
                            <cell_phone>" . $c->phone . "</cell_phone>
                            <email>" . $c->email . "</email>
                            <street_addr>" . $c->sa1 . "</street_addr>
                            <street_addr2>" . $c->sa2 . "</street_addr2>
                            <city>" . $c->scity . "</city>
                            <state_abbr>OH</state_abbr>
                            <postal>" . $c->szip . "</postal>
                            <agent_id>" . $agent_id . "</agent_id>
                            <referral_id></referral_id>
                            <response_ind>Y</response_ind>
                            <campaign_code>WEB</campaign_code>
                            <eai_trnno>" . $c->id . "</eai_trnno>
                            </ReadiSystem>]]></string>";
                            
        $xml_obj = simplexml_load_string($xml_string);

        $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Transaction", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
        $ac_request_str = $client->__getLastRequest();
        $ac_response_str = $client->__getLastResponse();

        // check status of soap request
        $fault = strpos($ac_response_str, 'faultcode');
        if($fault == true){
            $status = 'failed';
        }
        else{
            $status = "success";
        }
        
        $ac_request_str = htmlspecialchars_decode($ac_request_str);
        $ac_response_str = htmlspecialchars_decode($ac_response_str);

        DB::insert('insert into add_requests (customer_id, xml_string, status) values (?,?,?)', [$c->id, $ac_request_str, $status]);
        DB::insert('insert into add_responses (customer_id, xml_string) values (?,?)', [$c->id, $ac_response_str]);
    }

    public function submitToUtility($id){
        $url = env('SOAP_URL');
        $user = env('SOAP_USER');
        $pw = env('SOAP_PW');
        $output_params = array("output_xml;8000");
        $lang = env('SOAP_LANG');
        $entno = env('SOAP_ENTNO');
        $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));

        $xml_string = "<string><![CDATA[@input_xml;<ReadiSystem>
                            <proc_type>WO_sp_XN_WLOG_Add</proc_type>
                            <wlog_entno>" . $entno . "</wlog_entno>
                            <wlog_action_code>3P_VERIF</wlog_action_code>
                            <eai_trnno>" . $id . "</eai_trnno>
                            </ReadiSystem>]]></string>";

        $xml_obj = simplexml_load_string($xml_string);

        $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Transaction", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
        $submit_request_str = $client->__getLastRequest();
        $submit_response_str = $client->__getLastResponse();

        $submit_request_str = htmlspecialchars_decode($submit_request_str);
        $submit_response_str = htmlspecialchars_decode($submit_response_str);

        // check status of soap request
        $fault = strpos($submit_response_str, 'faultcode');
        if($fault == true){
            $status = 'failed';
        }
        else{
            $status = "success";
        }

        DB::insert('insert into submit_requests (customer_id, xml_string, status) values (?,?,?)', [$id, $submit_request_str, $status]);
        DB::insert('insert into submit_responses (customer_id, xml_string) values (?,?)', [$id, $submit_response_str]);
    }

}

