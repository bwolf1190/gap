<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnrollmentTest extends TestCase
{
    protected $customers = [];

    
    /** @test */
    public function create_customer_and_insert_web_enrollment()
    {   
        $plan = \App\Models\Plan::find(95);
        $last_customer = \App\Models\Customer::get()->last();
        $acc_num =  ++$last_customer->acc_num;
        
        // random string concat with random number
        $str = random_str(10);
        $confirmation_code = $str . mt_rand();

        $customer_input = [
            'status'           => 'PENDING',
            'acc_num'          => $acc_num,
            'Fed_Tax_Id_Num'   => '',
            'fname'            => 'Brett',
            'lname'            => 'Wolverton',
            'sa1'              => 'Service Address 1',
            'sa2'              => 'Apartment 2',
            'scity'            => 'Philadelphia',
            'sstate'           => 'PA',
            'mzip'             => '17001',
            'ma1'              => 'Mailing Address 1',
            'ma2'              => 'Apartment 2',
            'mcity'            => 'Philadelphia',
            'mstate'           => 'PA',
            'mzip'             => '17001',   
            'same_address'     => '',
            'email'            => 'bwolverton@greatamericanpower.com',
            'confirm_email'    => 'bwolverton@greatamericanpower.com',
            'phone'            => '8162104584',
            'terms_conditions' => 'checked',
            'promo'            => '',
            'plan_id'          => $plan->id,
            'cc'               => $confirmation_code,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $existing_customer = \App\Models\Customer::where('acc_num', $customer_input['acc_num'])->first();

        // create the customer if they don't already exist 
        if($existing_customer){
            return view('already-customer');
        }
        else{
            $customer = \App\Models\Customer::create($customer_input);
        }

        $enrollment_input = [
                  'enroll_date'       => date('Y-m-d H:i:s'),
                  'confirm_date'      => 'NULL',
                  'p2c'               => $plan->code, 
                  'agent_id'          => '',
                  'customer_id'       => $customer->id, 
                  'plan_id'           => $plan->id, 
                  'confirmation_code' => $confirmation_code,
                  'status'            => 'PENDING',
                  'agent_code'        => '',
                  'sub_agent_code'    => '',
                  'type'              => 'web'];

        $enrollment = \App\Models\Enrollment::create($enrollment_input);

        $this->assertEquals($enrollment->customer_id, $customer->id);
    }
}
