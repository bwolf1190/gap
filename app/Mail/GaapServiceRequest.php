<?php

namespace App\Mail;

use App\Models\GaapMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GaapServiceRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $gaapMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GaapMessage $gaapMessage)
    {
        $this->gaapMessage = $gaapMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.gaap-service-request')->subject('GAAP Service Request');
    }
}
