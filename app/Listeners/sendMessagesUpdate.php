<?php

namespace App\Listeners;

use App\Models\Message;
use App\Events\SendMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(SendMessage $event): void
    {
        $messageData = $event->message;
        Message::create([
            'sentFrom' => $messageData['sentFrom'],
            'sentTo' => $messageData['sentTo'],
            'content' => $messageData['content']
        ]);
    }
}
