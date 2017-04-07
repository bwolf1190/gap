<?php

namespace App\Jobs;

use DB;
use SoapClient;
use App\Models\Plan;
use App\Models\Customer;
use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class AddCustomerToCIS implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;
    protected $plan;
    protected $enrollment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, Plan $plan, Enrollment $enrollment)
    {
        $this->customer = $customer;
        $this->plan = $plan;
        $this->enrollment = $enrollment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->customer->id = "200";
        $url = env('SOAP_URL');
        $user = env('SOAP_USER');
        $pw = env('SOAP_PW');
        $output_params = array("output_xml;8000");
        $lang = env('SOAP_LANG');
        $entno = env('SOAP_ENTNO');
        $client = new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));
        // add agent_id if internal enrollment
        // otherwise agent_id is blank
        if($this->enrollment->agent_id){
            $agent_id = $this->enrollment->agent_id;
        }
        else{
            $agent_id = '';
        }

        // OPSOLVE FIX: system needs Residential to be "R" and Commercial to be "C"
        $type = $this->plan->type;
        if($type === "Residential"){
            $type = "R";
        }
        else{
            $type = "C";
        }
        

        /* HARDCODED FOR DUKE_OH LAUNCH */
    
        //$xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem><proc_type>GU_sp_XN_Enroll_Add</proc_type><entno>4270</entno><supno>" . $p->ldc . "</supno><eu_acct_no>" . $c->acc_num . "</eu_acct_no><gu_acct_no></gu_acct_no><price_code>" . $p->price_code ."</price_code><rev_type>" . $type . "</rev_type><last_name>" . $c->lname . "</last_name><first_name>" . $c->fname . "</first_name><main_phone>" . $c->phone . "</main_phone><cell_phone>" . $c->phone . "</cell_phone><email>" . $c->email . "</email><street_addr>" . $c->sa1 . "</street_addr><street_addr2>" . $c->sa2 . "</street_addr2><city>" . $c->scity . "</city><state_abbr>" . $c->sstate . "</state_abbr><postal>" . $c->szip . "</postal><agent_id>" . $agent_id . "</agent_id><referral_id></referral_id><response_ind>Y</response_ind><campaign_code>WEB</campaign_code><eai_trnno>" . $c->id . "</eai_trnno></ReadiSystem>]]></string>";
        $xml_string  = "<string><![CDATA[@input_xml;<ReadiSystem>
                            <proc_type>GU_sp_XN_Enroll_Add</proc_type>
                            <entno>" . $entno . "</entno>
                            <supno>DUKE_OH</supno>
                            <eu_acct_no>" . $this->customer->acc_num . "</eu_acct_no>
                            <gu_acct_no></gu_acct_no>
                            <price_code>" . $this->plan->price_code ."</price_code>
                            <rev_type>" . $type . "</rev_type>
                            <last_name>" . $this->customer->lname . "</last_name>
                            <first_name>" . $this->customer->fname . "</first_name>
                            <main_phone>" . $this->customer->phone . "</main_phone>
                            <cell_phone>" . $this->customer->phone . "</cell_phone>
                            <email>" . $this->customer->email . "</email>
                            <street_addr>" . $this->customer->sa1 . "</street_addr>
                            <street_addr2>" . $this->customer->sa2 . "</street_addr2>
                            <city>" . $this->customer->scity . "</city>
                            <state_abbr>OH</state_abbr>
                            <postal>" . $this->customer->szip . "</postal>
                            <agent_id>" . $agent_id . "</agent_id>
                            <referral_id></referral_id>
                            <response_ind>Y</response_ind>
                            <campaign_code>WEB</campaign_code>
                            <eai_trnno>" . $this->customer->id . "</eai_trnno>
                            </ReadiSystem>]]></string>";
                            
        $xml_obj = simplexml_load_string($xml_string);

        $client->ExecuteSP(array("user" => $user, "password" => $pw, "spName" => "RS_sp_EAI_Transaction", "paramList" => array($xml_obj), "outputParamList" => $output_params,"langCode" => $lang, "entity" => $entno)); 
        $add_request_str = $client->__getLastRequest();
        $add_response_str = $client->__getLastResponse();

        // check status of soap request
        $fault = strpos($add_response_str, 'faultcode');
        if($fault == true){
            $status = 'failed';
        }
        else{
            $status = "success";
        }
        
        $add_request_str = htmlspecialchars_decode($add_request_str);
        $add_response_str = htmlspecialchars_decode($add_response_str);

        DB::insert('insert into add_requests (customer_id, xml_string, status) values (?,?,?)', [$this->customer->id, $add_request_str, $status]);
        DB::insert('insert into add_responses (customer_id, xml_string) values (?,?)', [$this->customer->id, $add_response_str]);
    }
}
