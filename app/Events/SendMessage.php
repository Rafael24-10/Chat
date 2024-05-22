<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
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
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): PrivateChannel
    {
        $sentFrom = $this->message->sentFrom;
        $sentTo = $this->message->sentTo;
        $sortIdsAscending = [$sentFrom, $sentTo];
        sort($sortIdsAscending);

        return new PrivateChannel('chat.' . $sortIdsAscending[0] . $sortIdsAscending[1]);
    }

    public function broadcastWith()
    {
        return ['message' => $this->message->content];
    }
}
