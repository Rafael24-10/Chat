<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('sent.request', function(){
    return true;
});

// Broadcast::channel('chat.{userId1}.{userId2}', function (User $user, $userId1, $userId2) {
//     $sortIsAscending = [$userId1, $userId2];
//     sort($sortIsAscending);
//     return (int) $user->id === (int) $sortIsAscending[0] || (int) $user->id === (int) $sortIsAscending[1];
// });
