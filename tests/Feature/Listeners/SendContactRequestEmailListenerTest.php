<?php

namespace Tests\Feature\Listeners;

use App\Events\ContactRequestCreated;
use App\Listeners\SendContactRequestEmail;
use App\Mail\ContactRequestCreatedMail;
use App\Models\Contracts\ContactRequest;
use Database\Factories\ContactRequestFactory;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendContactRequestEmailListenerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
    }

    public function testEmailSent()
    {
        /** @var ContactRequest $contact */
        $contact = ContactRequestFactory::new()->make([
            'created_at' => now(),
        ]);

        (new SendContactRequestEmail())->handle(new ContactRequestCreated($contact));

        Mail::assertQueued(
            ContactRequestCreatedMail::class,
            function (ContactRequestCreatedMail $email) {
                return $email->hasTo(config('mail.from.address'));
            }
        );
    }
}
