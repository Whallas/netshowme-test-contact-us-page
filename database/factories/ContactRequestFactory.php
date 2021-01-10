<?php

namespace Database\Factories;

use App\Models\ContactRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = (string) Str::uuid();
        return [
            'id' => $id,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->e164PhoneNumber,
            'sender_ip' => $this->faker->localIpv4,
            'attachment_path' => ContactRequest::ATTACHMENT_FOLDER . "/$id/none.txt",
            'message' => $this->faker->text,
        ];
    }
}
