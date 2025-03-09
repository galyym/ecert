<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class CertificateRequest extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'iin',
        'activity_type',
        'specialty',
        'phone',
        'workplace',
        'sender_name',
        'document',
        'chat_id',
        'status',
        'certificate_number',
        'certificate_file',
        'user_id',
        'access_code'
    ];
}
