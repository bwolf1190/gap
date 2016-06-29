<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\Enrollment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendConfirmationEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $customer, $plan, $enrollment;

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

        $customer = $this->customer;
        $plan = $this->plan;
        $enrollment = $this->enrollment;
        Mail::send('emails.welcome', 
            ['customer' => $customer, 
            'plan' => $plan, 
            'enrollment' => $enrollment], 
                function ($m) use ($customer, 
                                    $plan, 
                                    $enrollment) {
                $m->from('enroll@perigeeenergy.com', 'GAP');
                $m->to('bwolverton@greatamericanpower.com');
                $m->subject("Email Confirmation");
        });
    }
}
