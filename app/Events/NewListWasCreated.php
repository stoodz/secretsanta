<?php

namespace App\Events;

use App\Events\Event;
use App\Giftlist;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewListWasCreated extends Event
{
    use SerializesModels;

    /**
     * @var Giftlist
     */
    public $giftlist;

    /**
     * Create a new event instance.
     *
     * @param Giftlist $giftlist
     * @return \App\Events\NewListWasCreated
     */
    public function __construct(Giftlist $giftlist)
    {

        $this->giftlist = $giftlist;
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
