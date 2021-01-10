<?php

namespace Tests\Unit\Mail;

use App\Mail\ContactRequestCreatedMail;
use App\Models\Contracts\ContactRequest;
use Database\Factories\ContactRequestFactory;
use Tests\TestCase;

class ContactRequestCreatedMailTest extends TestCase
{
    private ContactRequestCreatedMail $mailable;
    private ContactRequest $contact;

    protected function setUp(): void
    {
        parent::setUp();

        $this->contact = ContactRequestFactory::new()->make([
            'created_at' => now(),
        ]);
        $this->mailable = new ContactRequestCreatedMail($this->contact);
    }

    public function testEmailHeader()
    {
        $this->assertTrue(
            $this->mailable->hasFrom($this->contact->email, $this->contact->name)
        );
        $this->assertEquals(
            $this->mailable->subject,
            __('views.mails.contact_request_created.subject')
        );
    }

    public function testTextContent()
    {
        $this->mailable->assertSeeInText(__('views.mails.contact_request_created.subject'));
        $this->mailable->assertSeeInText($this->contact->id);
        $this->mailable->assertSeeInText($this->contact->message);
        $this->mailable->assertSeeInText($this->contact->phone_number);
        $this->mailable->assertSeeInText($this->contact->created_at->toDateTimeString());
    }
}
