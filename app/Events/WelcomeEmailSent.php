<?php

namespace App\Events;

use App\Models\Plan;
use App\Models\Customer;
use App\Models\Enrollment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class WelcomeEmailSent
{
    use InteractsWithSockets, SerializesModels;

    public $customer;
    public $plan;
    public $enrollment;

    /**
     * Create a new event instance.
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
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
