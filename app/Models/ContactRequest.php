<?php

namespace App\Models;

use App\Events\ContactRequestCreated;
use App\Models\Contracts\ContactRequest as ContactRequestContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model implements ContactRequestContract
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'sender_ip',
        'attachment_path',
        'message',
        'sender_ip',
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $dispatchesEvents = [
        'created' => ContactRequestCreated::class,
    ];
}
