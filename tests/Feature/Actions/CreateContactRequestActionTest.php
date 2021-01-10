<?php

namespace Tests\Feature\Actions;

use App\Actions\CreateContactRequestAction;
use App\DataTransferObjects\ContactRequestData;
use App\Models\Contracts\ContactRequest;
use Database\Factories\ContactRequestFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateContactRequestActionTest extends TestCase
{
    use RefreshDatabase;

    private ContactRequest $contactRequest;
    private ContactRequestData $contactRequestDTO;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        Event::fake();
        $this->contactRequestDTO = $this->newContactRequestDataInstance();
        $this->contactRequest = $this->newActionInstance()
            ->execute($this->contactRequestDTO);
    }

    public function testCreatedModelHasSameValueAsDto()
    {
        $dto = $this->contactRequestDTO->all() + [
            'attachment_path' => $this->getAttachmentPath(),
        ];
        $model = $this->contactRequest->getAttributes();

        $keys = array_keys(
            array_intersect_key($model, $dto)
        );

        $dto = Arr::only($dto, $keys);
        $model = Arr::only($model, $keys);

        $this->assertEquals($dto, $model);
    }

    public function testDatabaseHasTheContactRequest()
    {
        $this->assertDatabaseHas($this->contactRequest->getTable(), $this->contactRequest->getAttributes());
    }

    public function testAttachmentWasSaved()
    {
        Storage::assertExists($this->getAttachmentPath());
    }

    private function newContactRequestDataInstance(): ContactRequestData
    {
        $attributes = ContactRequestFactory::new()->raw([
            'attachment' => UploadedFile::fake()->create('test.txt'),
        ]);
        $attributes = Arr::only($attributes, [
            'name',
            'email',
            'phone_number',
            'message',
            'sender_ip',
            'attachment',
        ]);
        return new ContactRequestData(...$attributes);
    }

    private function getAttachmentPath(): string
    {
        return ContactRequest::ATTACHMENT_FOLDER . "/{$this->contactRequest->id}/test.txt";
    }

    private function newActionInstance(): CreateContactRequestAction
    {
        return $this->app->make(CreateContactRequestAction::class);
    }
}
