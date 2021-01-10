<?php

namespace App\Mail;

use App\Models\Contracts\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequestCreatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    private ContactRequest $contactRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactRequest $contactRequest)
    {
        $this->contactRequest = $contactRequest;
        $this->subject(__('views.mails.contact_request_created.subject'));
        $this->from($contactRequest->email, $contactRequest->name);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->attachFromStorage($this->contactRequest->attachment_path)
            ->markdown(
                'mails.contact_request_created',
                $this->contactRequest->getAttributes()
            );
    }
}
