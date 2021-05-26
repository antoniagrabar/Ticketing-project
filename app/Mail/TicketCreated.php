<?php

namespace App\Mail;
use App\Models\Ticket;
use App\Models\Contact;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function build()
    {
        $user = User::findOrFail($this->ticket->user_id);
        $user_email = $user->email;
        $contact = Contact::findOrFail($this->ticket->contact_id);

        return $this->from($user_email)
                    ->view('emails.tickets.created')
                    ->with([
                        'ticket' => $this->ticket,
                        'user' => $user,
                        'contact' => $contact,
                    ]);
        
    }
}
