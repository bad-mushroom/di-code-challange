<?php

namespace App\Listeners;

use App\Events\ContactAdded;
use App\Mail\ContactAddedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::to('guy-smiley@example.com')
            ->send(new ContactAddedEmail($event->contact));
    }
}
