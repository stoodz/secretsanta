<?php

namespace App\Listeners;

use App\Events\GuestAddedTheirName;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUpdateToListOwner
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
     * @param  GuestAddedTheirName  $event
     * @return void
     */
    public function handle(GuestAddedTheirName $event)
    {
        //
    }
}
