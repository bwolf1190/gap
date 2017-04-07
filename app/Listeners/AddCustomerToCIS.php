<?php

namespace App\Listeners;

use App\Events\WelcomeEmailSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddCustomerToCIS
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WelcomeEmailSent  $event
     * @return void
     */
    public function handle(WelcomeEmailSent $event)
    {
        echo $event->customer->id . " " . $event->plan->ldc . " " . $event->enrollment->enroll_date;
    }
}
