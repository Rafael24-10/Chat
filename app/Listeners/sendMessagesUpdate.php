<?php

namespace App\Listeners;

use App\Events\sendMessage;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendMessagesUpdate
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(sendMessage $event): void
    {
        $messageData = $event->message;
        Message::create([
            'sentFrom' => $messageData['sentFrom'],
            'sentTo' => $messageData['sentTo'],
            'content' => $messageData['content']

        ]);
    }
}
