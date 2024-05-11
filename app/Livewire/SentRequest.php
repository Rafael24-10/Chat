<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class SentRequest extends Component
{
    public $users;
    public $authenticatedUser;
     public function mount()
     {
         $this->authenticatedUser = Auth::user();
         $authenticatedUser = $this->authenticatedUser->id;

         $this->users = User::with(['receivedfriendRequests' => function ($query) use ($authenticatedUser) {
             $query->where('sentFrom', $authenticatedUser)->select('sentTo', 'status');
         }])->has('receivedfriendRequests')->get();
     }



    public function render()
    {
        return view('livewire.sent-request');
    }
}
