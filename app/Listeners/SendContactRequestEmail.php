<?php

namespace App\Listeners;

use App\Events\ContactRequestCreated;
use App\Mail\ContactRequestCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendContactRequestEmail
{
    /**
     * Handle the event.
     *
     * @param ContactRequestCreated $event
     * @return void
     */
    public function handle(ContactRequestCreated $event)
    {
        Mail::to(config('mail.from.address'))
            ->queue(new ContactRequestCreatedMail($event->contactRequest));
    }
}
