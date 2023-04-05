<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAdmin extends Model
{
    use HasFactory;

    public function chatAdmin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id_admin');
    }

    public function chatUserTelegram()
    {
        return $this->belongsTo(UsersTelegram::class, 'id_user', 'id_user');
    }
}
