<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{

    /** @test */
    public function visit_welcome_page()
    {
        $this->visit('/')->see('What We Do');
    }

    /** @test */
    public function visit_faq_page(){
        $this->visit('/faq-frequently-asked-questions-energy-electricity')->see('Frequently Asked Questions');
    }

    /** @test */
    public function visit_contact_page(){
        $this->visit('/contact-us-customer-service')->see('Contact Us');
    }

    /** @test */
    public function visit_enroll_page(){
        $this->visit('/enroll-sign-up-energy-electricity')->see('enroll_container');
    }

    /** @test */
    public function visit_historical_rates_page(){
        $this->visit('/historical-rates')->see('Historical Rates');
    }

}
