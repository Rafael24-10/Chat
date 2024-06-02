<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{userId1}.{userId2}', function (User $user, $userId1, $userId2) {

    return (int) $user->id === (int) $userId1 || (int) $user->id === (int) $userId2;
});
