<?php

namespace App\Providers;

use App\Events\CreatedTicket;
use App\Listeners\SendTicketNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
 
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreatedTicket::class => [
            SendTicketNotification::class,
        ],
    ];


    public function boot()
    {
        //
    }
}
