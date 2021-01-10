<?php

namespace App\Actions;

use App\DataTransferObjects\ContactRequestData;
use App\Models\Contracts\ContactRequest;
use Illuminate\Support\Str;

class CreateContactRequestAction
{
    public function __construct(private ContactRequest $contact)
    {
    }

    /**
     * Register a contact request into database
     *
     * @param ContactRequestData $data
     * @return ContactRequest
     */
    public function execute(ContactRequestData $data): ContactRequest
    {
        $contact = $this->contact->fill($data->all());

        $contact->id = (string) Str::uuid();

        $contact->attachment_path = $data->attachment
            ->storeAs(
                ContactRequest::ATTACHMENT_FOLDER . "/$contact->id",
                $data->attachment->getClientOriginalName()
            );

        $contact->save();

        return $contact;
    }
}
