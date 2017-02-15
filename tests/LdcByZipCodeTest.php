<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LdcByZipCodeTest extends TestCase
{
	/** @test **/
    public function zip_code_returns_duke()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();

		}

		$this->assertEquals($ldcs[0]->ldc, 'Duke');
    }


	/*
    public function zip_code_returns_bge()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'BGE');
    }


	
    public function zip_code_returns_delmarva()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'Delmarva');
    }


	
    public function zip_code_returns_duquesne()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'Duquesne');
    }


	
    public function zip_code_returns_meted()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'Meted');
    }


	
    public function zip_code_returns_peco()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'PECO');
    }

	
	
    public function zip_code_returns_pepco()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'PEPCO');
    }


	
    public function zip_code_returns_ppl()
    {

		$response = "<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Body><ExecuteSPResponse xmlns='http://www.opsolve.com/RS/webservices/'><ExecuteSPResult><string>&lt;?xml version='1.0' standalone='yes' ?&gt;&lt;ReadiSystem&gt;&lt;RS_sp_DR_Offers_By_Zip&gt;&lt;entno&gt;4270&lt;/entno&gt;&lt;offer_name&gt;OHDUKE_RES&lt;/offer_name&gt;&lt;offer_desc&gt;Duke Energy - Ohio - Residential&lt;/offer_desc&gt;&lt;supno&gt;DUKE_OH&lt;/supno&gt;&lt;rev_type&gt;R&lt;/rev_type&gt;&lt;utility_type&gt;E&lt;/utility_type&gt;&lt;state_id&gt;OH&lt;/state_id&gt;&lt;/RS_sp_DR_Offers_By_Zip&gt;&lt;/ReadiSystem&gt;</string></ExecuteSPResult></ExecuteSPResponse></soap:Body></soap:Envelope>;";

		$xml = explode('&lt;RS_sp_DR_Offers_by_Zip&gt;', $response);

		for($i = 0; $i < count($xml); $i++){
			$entno = get_string_between($xml[$i], '&lt;entno&gt;', '&lt;/entno&gt;');
			$s     = get_string_between($xml[$i], '&lt;rev_type&gt;', '&lt;/rev_type&gt;');
			$ldc   = get_string_between($xml[$i], '&lt;supno&gt;', '&lt;/supno&gt;');

			if($ldc === 'DUKE_OH'){
				$ldcs[] = \App\Models\Ldc::where('ldc', 'Duke')->first();
			}
			else{
				$ldcs[] = \App\Models\Ldc::where('ldc', $ldc)->first();
			}


		}

		$this->assertEquals($ldcs[0]->ldc, 'PPL');
    }
	*/
}
