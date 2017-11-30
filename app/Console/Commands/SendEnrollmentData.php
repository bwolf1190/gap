<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEnrollmentData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:enrollments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email confirmed/unconfirmed enrollments to service email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \App\Http\Controllers\CommandController::sendEnrollmentData();
        $this->info('Enrollment data has been sent to customer service');
    }
}
