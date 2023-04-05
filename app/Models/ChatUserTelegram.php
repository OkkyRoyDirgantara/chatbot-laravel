<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUserTelegram extends Model
{
    protected $table = 'chat_user_telegram';
    use HasFactory;

    public function chatUserTelegram()
    {
        return $this->belongsTo(UsersTelegram::class, 'id_user', 'id_user');
    }
}
