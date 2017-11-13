<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Plan;
use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BrokerEnrollmentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $plan;
    public $enrollment;
    public $subject;  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, Plan $plan, Enrollment $enrollment, $subject)
    {
        $this->customer   = $customer;
        $this->plan       = $plan;
        $this->enrollment = $enrollment;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.broker-confirmed')
                    ->subject($this->subject);
    }
}
