<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SendMessage implements ShouldBroadcastNow 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
        // $sentFrom = $this->message->sentFrom;
        // $sentTo = $this->message->sentTo;
        // $sortIdsAscending = [$sentFrom, $sentTo];
        // sort($sortIdsAscending);
        // dd($sortIdsAscending);
        // dd($this->message);
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return <int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        // $sentFrom = $this->message->sentFrom;
        // $sentTo = $this->message->sentTo;
        // $sortIdsAscending = [$sentFrom, $sentTo];
        // sort($sortIdsAscending);
        // $sortIdsAscending[0] . $sortIdsAscending[1]

        return new Channel('chat');
    }

    // public function broadcastWith()
    // {
    //     return ['message' => $this->message->content];
    // }
}
