<?php

namespace App\Listeners;

use App\Events\NameWasDrawn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailGuestWithNameDrawn
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
     * @param  NameWasDrawn  $event
     * @return void
     */
    public function handle(NameWasDrawn $event)
    {
        return Mail::send('emails.names', [
            'listName'  => $event->guest->giftlist->list,
            'guest_name'  => $event->guest->giving_to
        ], function ($message) use ($event)
        {
            $message->to($event->guest->email)
                ->subject('Your Secret Santa Name');
        });
    }
}
