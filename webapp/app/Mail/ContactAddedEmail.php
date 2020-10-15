<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAddedEmail extends Mailable
{
    use Queueable, SerializesModels;


    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.contact_added')
            ->with(['contact' => $this->contact]);
    }
}
