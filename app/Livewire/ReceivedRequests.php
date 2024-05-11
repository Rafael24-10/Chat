<?php

namespace App\Livewire;

use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ReceivedRequests extends Component
{
    public $requests;
    public $authenticatedUser;

    public function mount()
    {
        $this->authenticatedUser = Auth::user();
        $authenticatedUserId = $this->authenticatedUser->id;

        $this->requests = User::whereHas('sentFriendrequests', function ($query) use ($authenticatedUserId) {
            $query->where('sentTo', $authenticatedUserId)
                ->where('sentFrom', '!=', $authenticatedUserId);
        })
            ->with(['sentFriendrequests' => function ($query) use ($authenticatedUserId) {
                $query->where('sentTo', $authenticatedUserId)
                    ->where('sentFrom', '!=', $authenticatedUserId)
                    ->select('sentFrom', 'created_at', 'status');
            }])
            ->get();
    }

    public function acceptRequest($userId)
    {
        $request = FriendRequest::where('sentFrom', $userId)->first();
        $request->status = 'accepted';
        if ($request->save()) {
            Friend::create([
                'user_id' => $this->authenticatedUser->id,
                'friend_id' => $userId
            ]);

            Friend::create([
                'user_id' => $userId,
                'friend_id' => $this->authenticatedUser->id
            ]);
        }
        $this->redirectRoute('notifications');
    }

    public function render()
    {
        return view('livewire.received-requests');
    }
}
