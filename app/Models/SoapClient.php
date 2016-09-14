<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SoapClient;


class SoapClient
{
	public $url;
	public $user;
	public $pw;
	public $output_params;
	public $lang;
	public $entno;
	public $client;

	public function __construct(){
        $this->url = env('SOAP_URL');
        $this->user = env('SOAP_USER');
        $this->pw = env('SOAP_PW');  
        $this->output_params = array("output_xml;8000");
        $this->lang = env('SOAP_LANG');
        $this->entno = env('SOAP_ENTNO');

        return $this;
		//return new SoapClient($url, array("trace" => 1, "exceptions" => 0, "cache_wsdl" => 0));
	}

	public function addCustomer(){

	}

	public function getPlans(){

	}	

}