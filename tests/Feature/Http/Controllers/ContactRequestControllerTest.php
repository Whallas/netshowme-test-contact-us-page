<?php

namespace Tests\Feature\Http\Controllers;

use App\Actions\CreateContactRequestAction;
use Database\Factories\ContactRequestFactory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Mockery\MockInterface;
use Tests\TestCase;

class ContactRequestControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function testGetIndex()
    {
        $this->get(route('contact_us.index'))
            ->assertOk()->assertViewIs('pages.contact_us');
    }

    public function testStore()
    {
        $this->mock(CreateContactRequestAction::class, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->once();
        });

        $this->post(route('contact_us.store'), $this->formDataArray())
            ->assertRedirect(route('contact_us.index'))
            ->assertSessionHas('success');
    }

    private function formDataArray(): array
    {
        $attributes = ContactRequestFactory::new()->raw([
            'attachment' => UploadedFile::fake()->create('test.txt'),
        ]);
        return Arr::only($attributes, [
            'name',
            'email',
            'phone_number',
            'message',
            'attachment',
        ]);
    }
}
