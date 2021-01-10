<?php

namespace App\Models\Contracts;

use Carbon\Carbon;

/**
 * ContactRequest model interface
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $sender_ip
 * @property string $message
 * @property string $attachment_path
 * @property string|Carbon $created_at
 * @property string|Carbon $updated_at
 */
interface ContactRequest extends Model
{
    public const ATTACHMENT_FOLDER = 'contact_requests';
}
