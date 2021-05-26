<?php

namespace App\Listeners;

use App\Events\CreatedTicket;
use App\Mail\TicketCreated;
use App\Models\Ticket;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTicketNotification
{

    public function __construct()
    {
    }

    public function handle(CreatedTicket $event)
    {
        $contact = Contact::findOrFail($event->ticket->contact_id);
        $contact_email = $contact->email_address;

        Mail::to($contact_email)
            ->send(new TicketCreated($event->ticket));
    }
}
