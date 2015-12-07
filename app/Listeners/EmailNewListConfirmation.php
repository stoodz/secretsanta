<?php

namespace App\Listeners;

use App\Events\NewListWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailNewListConfirmation
{

    /**
     * Create the event listener.
     *
     * @return \App\Listeners\EmailNewListConfirmation
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewListWasCreated  $event
     * @return void
     */
    public function handle(NewListWasCreated $event)
    {

        return Mail::send(['html' => 'emails.newlist'],[
            'listName'          => $event->giftlist->list,
            'activationCode'    => $event->giftlist->activation,
            'listLink'          => urlencode($event->giftlist->list)
            ], function ($message) use ($event)
            {
                $message->to($event->giftlist->email)
                ->subject('Welcome to Secret Santa');
            });

    }
}