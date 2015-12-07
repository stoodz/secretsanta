<?php

namespace App\Events;

use App\Events\Event;
use App\Guest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NameWasDrawn extends Event
{
    use SerializesModels;
    /**
     * @var Guest
     */
    public $guest;

    /**
     * Create a new event instance.
     *
     * @param Guest $guest
     * @return \App\Events\NameWasDrawn
     */
    public function __construct(Guest $guest)
    {
        //
        $this->guest = $guest;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
