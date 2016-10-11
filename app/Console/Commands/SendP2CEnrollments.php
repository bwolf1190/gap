<?php

namespace App\Console\Commands;

use \App\Http\Controllers\CommandController;

use Illuminate\Console\Command;

class SendP2CEnrollments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:p2c';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send enrollments to P2C';

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
        \App\Http\Controllers\CommandController::sendP2CEnrollments();
        $this->info('Enrollments have been sent to P2C');
    }
}
