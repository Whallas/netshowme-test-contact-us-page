<?php

namespace Tests\Feature\Models\Eloquent;

use App\Events\ContactRequestCreated;
use App\Models\ContactRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ContactRequestModelTest extends TestCase
{
    use RefreshDatabase;

    private ContactRequest $contactRequest;

    protected function setUp(): void
    {
        parent::setUp();
        Event::fake();
        $this->contactRequest = ContactRequest::factory()->create();
    }

    public function testCreate()
    {
        $this->assertDatabaseHas($this->contactRequest->getTable(), $this->contactRequest->getAttributes());
    }

    public function testModelDispatchesEventOnCreate()
    {
        Event::assertDispatched(
            ContactRequestCreated::class,
            fn (ContactRequestCreated $contact) => $contact->contactRequest->id === $this->contactRequest->id
        );
    }

    public function testUpdateFillableAttributes()
    {
        $new = ContactRequest::factory()->make()->only($this->contactRequest->getFillable());
        $this->contactRequest->update($new);
        $this->assertDatabaseHas(
            $this->contactRequest->getTable(),
            $new + $this->contactRequest->only('id')
        );
    }

    public function testModelNotDispatchesEventOnUpdate()
    {
        Event::assertDispatchedTimes(ContactRequestCreated::class, 1);
    }
}
