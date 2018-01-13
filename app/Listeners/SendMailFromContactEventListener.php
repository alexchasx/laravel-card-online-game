<?php

namespace App\Listeners;

use App\Events\SendMailFromContactEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFromContactEventListener
{
    /**
     * Handle the event.
     *
     * @param  SendMailFromContactEvent  $event
     * @return void
     */
    public function handle(SendMailFromContactEvent $event)
    {
        Mail::send(config('app.admin_email'), $data, function ($message) {
            //

            $message->attach($pathToFile);
        });
    }
}
