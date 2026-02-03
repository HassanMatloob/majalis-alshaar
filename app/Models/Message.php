<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'subject',
        'message'
    ];
}
