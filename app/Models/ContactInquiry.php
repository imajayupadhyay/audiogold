<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'first_name',
        'email',
        'phone',
        'message',
        'page_source',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
