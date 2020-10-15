<?php

namespace App\Events;

use App\Models\Contact;

class ContactAdded extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}
