<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnrollmentTest extends TestCase
{
    protected $customers = [];
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEnrollment()
    {
        $names = array('Jill', 'Joe', 'John', 'Jerry', 'Tim', 'Terry', 'Stan', 'Kyle', 'Kenny', 'Butters');
        $plans = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $acc_num_start = '096';
        $routes = [];
        
        for($i = 0; $i < count($plans); $i++){
            $route = 'customers/start/' . $plans[$i];
            $routes = $route;
            $acc_num_int = (int) $acc_num_start;
            $acc_num_int += $i;
            $acc_num = (string) $acc_num_int;

            $this->visit($route)
                 ->type($acc_num, 'acc_num')
                 ->type($names[$i], 'fname')
                 ->type('Wolverton', 'lname')
                 ->press('next1');

            $this->customers[$i] = $names[$i];
        }

        if(count($this->customers) === count($names)){
            $result = true;
        }
        else{
            $result = false;
        }

        $string = '';
        for($i = 0; $i < count($this->customers); $i++){
            $string .= $this->customers[$i] . ' ';
        }

        $this->assertNotEmpty($this->customers);

    }

}
