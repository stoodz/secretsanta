<?php namespace App\Listeners;

use App\Events\NameWasDrawn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LogTheNameDrawn
{

    /**
     * Create the event listener.
     *
     * @return \App\Listeners\LogTheNameDrawn
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
        $data = $event->guest->email . ' gave to ' . $event->guest->giving_to . "\n";

//        logToFile('/var/www/santa/public/assets/logfile.php',$data);

        return true;
    }
}
