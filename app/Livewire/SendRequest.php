<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SendRequest extends Component
{
    public $authenticatedUser;
    public $users;
    public $friendRequests;

    public function mount()
    {
        $this->authenticatedUser = Auth::user();

        $authenticatedUser = $this->authenticatedUser->id;

        $this->users = User::whereNotIn('id', function ($query) use ($authenticatedUser) {
            $query->select('sentTo')
                ->from('friend_requests')->where('sentFrom', $authenticatedUser);
        })->where('id', '!=', $authenticatedUser)->get();
    }

    public function makeRequest($sentTo)
    {
        FriendRequest::create([
            'sentFrom' => $this->authenticatedUser->id,
            'sentTo' => $sentTo,
        ]);

        return redirect()->route('users');
    }

    public function getUserRequests()
    {

        FriendRequest::all()->where('sentFrom', $this->authenticatedUser->id);
    }

    public function render()
    {

        return view('livewire.send-request');
    }
}
