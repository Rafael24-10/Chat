<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('message.{messageId}', function (User $user, int $messageId) {
    return $user->id === Message::find($messageId)->user_id;
});
