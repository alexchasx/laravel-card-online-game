<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogSentMessage
{
    /**
     * @param  MessageSending  $event
     *
     * @return void
     */
    public function handle(MessageSending $event)
    {
        Log::info($event->message);
    }
}
