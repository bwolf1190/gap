<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SoapClient;
use Response;
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
    public function sendWelcome($customer){
        $customer = \App\Models\Customer::where('id',$customer)->first();
        $plan = \App\Models\Plan::where('id', $customer->plan_id)->first();
        $enrollment = \App\Models\Enrollment::where('customer_id', $customer->id)->first();

        // for sending confirmation email to brokers
        $broker = $enrollment->agent_code;
        if($broker !== ''){
            $this->sendBrokerConfirmation($customer, $plan, $enrollment);
        }

        // if the enrollment is null, then it must be an InternalEnrollment
        if(is_null($enrollment)){
            $enrollment = \App\Models\InternalEnrollment::where('customer_id', $customer->id)->first();
        }
        
        // commented out until plans match opsolve database
        //$this->executeSoap($customer, $plan, $enrollment);

        Mail::queue('emails.welcome', ['customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment], function ($m) use ($customer, $plan, $enrollment) {
                $m->from('Enrollment@greatamericanpower.com', 'GAP');
                $m->to($customer->email);
                $m->subject("Email Confirmation");
        });

        return view('emails.welcome-landing')->with('customer', $customer)->with('plan', $plan);
    }

    /**
     * Customer has clicked the confirmation link sent in the welcome email
     * Check that the confirmation code in the link matches that of the enrollment
     * Check that email has not already been confirmed
     */
    public function confirmEmail($customer, $confirmation_code){
        $enrollment = \App\Models\Enrollment::where('customer_id', $customer)->first();
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
            
              return view('emails.confirmation')
                ->with('customer', $customer)->with('confirmation_code', $confirmation_code);
        }
        else{
          return view('welcome');
        }

    }

    /**
     * Sends a confirmation email to the address stored for the given Broker
     */
    public function sendBrokerConfirmation($customer, $plan, $enrollment){
        $broker = \App\Models\Broker::where('name', $enrollment->agent_code)->first();
        Mail::queue('emails.broker-confirmation', ['customer' => $customer, 'plan' => $plan, 'enrollment' => $enrollment], function ($m) use ($customer, $plan, $enrollment) {
                $m->from('Enrollment@greatamericanpower.com', 'GAP');
                $m->to($broker->email);
                $m->subject("Broker Enrollment Received");
        });
    }

    /**
     * Create XML to be sent by SOAP call
     */
    public function executeSoap($c, $p, $e){
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

        //$xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4270</entno><supno>" . $p->ldc . "</supno><eu_acct_no>" . $c->acc_num . "</eu_acct_no><gu_acct_no></gu_acct_no><price_code>" . $p->price_code ."</price_code><rev_type>" . $type . "</rev_type><last_name>" . $c->lname . "</last_name><first_name>" . $c->fname . "</first_name><main_phone>" . $c->phone . "</main_phone><cell_phone>" . $c->phone . "</cell_phone><email>" . $c->email . "</email><street_addr>" . $c->sa1 . "</street_addr><street_addr2>" . $c->sa2 . "</street_addr2><city>" . $c->scity . "</city><state_abbr>" . $c->sstate . "</state_abbr><postal>" . $c->szip . "</postal><agent_id>" . $agent_id . "</agent_id><referral_id></referral_id><response_ind>Y</response_ind><campaign_code>WEB</campaign_code><eai_trnno>" . $c->id . "</eai_trnno></ReadiSystem>]]></string>";
        $xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem>
                            <proc_type>GU_sp_XN_Enroll_Add</proc_type>
                            <entno>4270</entno>
                            <supno>" . $p->ldc . "</supno>
                            <eu_acct_no>" . $c->acc_num . "</eu_acct_no>
                            <gu_acct_no></gu_acct_no>
                            <price_code>" . "10260" ."</price_code>
                            <rev_type>" . $type . "</rev_type>
                            <last_name>" . $c->lname . "</last_name>
                            <first_name>" . $c->fname . "</first_name>
                            <main_phone>" . $c->phone . "</main_phone>
                            <cell_phone>" . $c->phone . "</cell_phone>
                            <email>" . $c->email . "</email>
                            <street_addr>" . $c->sa1 . "</street_addr>
                            <street_addr2>" . $c->sa2 . "</street_addr2>
                            <city>" . $c->scity . "</city>
                            <state_abbr>" . $c->sstate . "</state_abbr>
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

        DB::insert('insert into soap_requests (customer_id, xml_string, status) values (?,?,?)', [$c->id, $ac_request_str, $status]);
        DB::insert('insert into soap_responses (customer_id, xml_string) values (?,?)', [$c->id, $ac_response_str]);
    }

}

