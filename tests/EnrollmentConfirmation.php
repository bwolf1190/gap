<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnrollmentConfirmation extends TestCase
{

	public function setUp(){

	}

	/**
	 * @test
	 */
    public function send_confirmation_email_to_new_customer()
    {
		/*$customer = [
					'fname' => 'Brett', 
					'email' => 'bwolverton@greatamericanpower.com'
		];

		$plan = [
				'ldc' => 'PPL',
				'length' => '12',
				'type' => 'Residential',
				'rate' => '$0.0919'
		];

		// random string concat with random number
		$str = random_str(10);
		$confirmation_code = $str . mt_rand();

		$enrollment = ['confirmation_code' => $confirmation_code];

		Mail::to($customer->email)->queue(new EnrollmentConfirmation);
	*/
    }
}
