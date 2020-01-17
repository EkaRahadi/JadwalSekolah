<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BunyikanBel implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ringtone;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ringtone)
    {
        $this->ringtone = $ringtone;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['ringtone-ringing'];
        // return new PrivateChannel('ringtone-ringing');
    }

    public function broadcastAs()
    {
        return 'bunyi-event';
    }
}
