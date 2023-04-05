<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTelegram extends Model
{
    protected $table = 'users_telegram';
    use HasFactory;

    public function getById($id)
    {
        return $this->where('id_user', $id)->first();
    }

    public function userTelegram()
    {
        return $this->hasMany(ChatUserTelegram::class, 'id_user', 'id_user');
    }
}
