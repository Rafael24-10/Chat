<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    #[Validate('required|min:1')]
    public $value = '';

    public $users;
    public $messages;
    private $authenticatedUser;
    public $selectedUser;

    public function mount()
    {
        $this->authenticatedUser = Auth::user();
        $this->users =  User::where('name', '!=', $this->authenticatedUser->name)->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name
            ];
        });
    }


    public function getUserMessages($id)
    {

        $this->authenticatedUser = Auth::user();
        $this->selectedUser = $id;

        $messages = Message::all()->where('sentFrom', $this->authenticatedUser->id)
            ->where('sentTo', $this->selectedUser);
        return $this->messages = $messages->toArray();
    }

    public function sendMessage()
    {
        $this->authenticatedUser = Auth::user();
        Message::create([
            'sentFrom' => $this->authenticatedUser->id,
            'sentTo' => $this->selectedUser,
            'content' => $this->value
        ]);


        // $this->dispatch('input-value', data: $this->value);
        // $this->value = '';
    }



    public function render()
    {
        return view('livewire.chat');
    }
}
