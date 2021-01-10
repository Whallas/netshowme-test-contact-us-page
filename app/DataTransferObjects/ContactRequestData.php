<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;

class ContactRequestData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone_number,
        public string $message,
        public string $sender_ip,
        public UploadedFile $attachment
    ) {
    }

    public function all(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'message' => $this->message,
            'sender_ip' => $this->sender_ip,
            'attachment' => $this->attachment,
        ];
    }
}
