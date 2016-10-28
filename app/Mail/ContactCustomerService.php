<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactCustomerService extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $inquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $inquiry)
    {
        //
        $this->name    = $name;
        $this->phone   = $phone;
        $this->email   = $email;
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-customer-service')
                    ->subject('GAP Website Message');
    }
}
