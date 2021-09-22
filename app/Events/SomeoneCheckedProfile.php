<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SomeoneCheckedProfile
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public $user_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,$user_id)
    {
        $this->user = $user;
        $this->user_id = $user_id;
    }
}
