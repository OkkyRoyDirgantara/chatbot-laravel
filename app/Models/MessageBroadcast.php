<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageBroadcast extends Model
{
    protected $table = 'message_broadcast';

    protected $fillable = [
        'message'
    ];
    use HasFactory;
}
