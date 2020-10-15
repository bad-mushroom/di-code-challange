<?php

namespace App\Listeners;

use App\Events\ContactAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactReceivedEmail
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactAdded  $event
     * @return void
     */
    public function handle(ContactAdded $event)
    {
        dd($event);
    }
}
