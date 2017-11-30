<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEnrollmentData extends Mailable
{
    use Queueable, SerializesModels;

    public $folder;
    public $confirmed_file;
    public $pending_file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($folder, $confirmed_file, $pending_file)
    {
        //
        $this->folder = $folder;
        $this->confirmed_file = $confirmed_file;
        $this->pending_file = $pending_file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = date('m/d/y');
        $folder = substr($this->folder, 1);
        
        $confirmed_path = storage_path($folder . '/' . $this->confirmed_file . '.xls');
        $pending_path = storage_path($folder . '/' . $this->pending_file . '.xls');

        return $this->view('emails.enrollment-data')->subject('Enrollment Data')->attach($confirmed_path)->attach($pending_path)->with(['date' => $date]);

    }
}
