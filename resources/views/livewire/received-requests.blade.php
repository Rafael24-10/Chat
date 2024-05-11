<div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 
dark:via-transparent border rounded-lg border-gray-200 
dark:border-gray-700 max-h-96 w-5/12 shadow-xl overflow-y-auto "
    style="min-height: 400px">
    <div class="w-full h-16 bg-transparent flex items-center justify-center border-b border-gray-700">
        <p class="text-2xl font-bold dark:text-white">Friend Requests</p>
    </div>
    <ul>
        @if ($requests != null)
            @foreach ($requests as $user)
                @foreach ($user->sentFriendrequests as $request)
                    @if ($request->status === 'pending')
                        <li
                            class="h-12 bg-transparent flex items-center justify-between pl-4 pr-4 mt-2 pb-2 text-lg border-b border-black dark:border-gray-700">
                            <p class="text-white">{{ $user['name'] }}</p>
                            <div>
                                <button
                                    class="bg-green-600 hover:bg-green-700 transition-all dark:text-white px-4 py-2 rounded-lg"
                                    wire:click="acceptRequest({{ $user['id'] }})">Accept
                                </button>
                                <button
                                    class="bg-red-600 hover:bg-red-700 dark:text-white transition-all px-4 py-2 rounded-lg"
                                    wire:click="declineRequest({{ $user['id'] }})">Decline
                                </button>
                            </div>
                        </li>
                    @endif
                @endforeach
            @endforeach
        @else
            <h3>No new friend requests!</h3>

        @endif


    </ul>
</div>
