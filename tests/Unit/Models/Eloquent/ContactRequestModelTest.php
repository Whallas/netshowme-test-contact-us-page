<?php

namespace Tests\Unit\Models\Eloquent;

use App\Models\ContactRequest;
use App\Models\Contracts\ContactRequest as ContactRequestContract;
use Tests\TestCase;

class ContactRequestModelTest extends TestCase
{
    public function testModelInstanceOfContract()
    {
        $this->assertInstanceOf(ContactRequestContract::class, new ContactRequest());
    }

    public function testModelTable()
    {
        $this->assertEquals((new ContactRequest())->getTable(), 'contact_requests');
    }

    public function testFillableArray()
    {
        $this->assertEquals(
            (new ContactRequest())->getFillable(),
            [
                'name',
                'email',
                'phone_number',
                'sender_ip',
                'attachment_path',
                'message',
                'sender_ip',
            ]
        );
    }

    public function testModelAreNotIncrementing()
    {
        $this->assertEquals((new ContactRequest())->getIncrementing(), false);
    }

    public function testKeyTypeIsString()
    {
        $this->assertEquals((new ContactRequest())->getKeyType(), 'string');
    }
}
