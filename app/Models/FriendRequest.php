<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    public function sender(){
        return $this->belongsTo(User::class, 'sentFrom');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'sentTo');
    }
}
