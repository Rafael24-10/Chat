<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sentFrom',
        'sentTo',
        'content'
    ];

    public function sender(){
        return $this->belongsTo(User::class, 'sentFrom');
    }

    public function Receiver(){
        return $this->belongsTo(User::class, 'sentTo');
    }

    
}
