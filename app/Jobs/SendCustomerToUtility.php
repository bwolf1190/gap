<?php

namespace App\Jobs;

use DB;
use SoapClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCustomerToUtility implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->id = "210";
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
                            <wlog_acntion_code>3P_VERIF</wlog_action_code>
                            <eai_trnno>" . $this->id . "</eai_trnno>
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

        DB::insert('insert into submit_requests (customer_id, xml_string, status) values (?,?,?)', [$this->id, $submit_request_str, $status]);
        DB::insert('insert into submit_responses (customer_id, xml_string) values (?,?)', [$this->id, $submit_response_str]);
    }
}
