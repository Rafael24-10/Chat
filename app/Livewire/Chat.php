<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Friend;
use App\Models\Message;
use Livewire\Component;
use App\Events\SendMessage;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $value = '';
    public $messages;
    public $authenticatedUser;
    public $selectedUser;
    public $friends;

    public function mount()
    {
        $this->authenticatedUser = Auth::user();
        $friendIds = Friend::where('user_id', $this->authenticatedUser->id)
            ->pluck('friend_id');

        $this->friends = User::whereIn('id', $friendIds)->get();
        if (!($this->friends)) {
            return null;
        }
    }

    #[On('echo:chat,SendMessage')]
    public function newMessages()
    {
        $this->messages = $this->getUserMessages($this->selectedUser);
        $this->dispatch('newMessage');

    }
    public function getUserMessages($id)
    {

        $this->authenticatedUser = Auth::user();
        $this->selectedUser = $id;
        $query = Message::where('sentFrom', $this->authenticatedUser->id)
            ->where('sentTo', $this->selectedUser)
            ->orWhere(function ($query) {
                $query->where('sentFrom', $this->selectedUser)
                    ->where('sentTo', $this->authenticatedUser->id);
            })->orderBy('created_at')->get();

        return $this->messages = $query->toArray();
        

    }

    public function sendMessage()
    {
        $this->authenticatedUser = Auth::user();
        $message = new Message();
        $message->sentFrom = $this->authenticatedUser->id;
        $message->sentTo = $this->selectedUser;
        $message->content = $this->value;

        SendMessage::dispatch($message);
        $this->getUserMessages($this->selectedUser);
        $this->dispatch('newMessage');
        $this->value = '';
    }



    public function render()
    {
        return view('livewire.chat');
    }
}
