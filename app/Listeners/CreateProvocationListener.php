<?php

namespace App\Listeners;

use App\Events\CreateProvocation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProvocationListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateProvocation  $event
     * @return void
     */
    public function handle(CreateProvocation $event)
    {
        //
    }
}
