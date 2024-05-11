<div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 
dark:via-transparent border rounded-lg border-gray-200 
dark:border-gray-700 max-h-96 w-5/12 shadow-xl overflow-y-auto "
    style="min-height: 400px">

    <div class="h-16 border-b border-1 border-gray-700 flex items-center justify-center">
        <p class="text-2xl font-bold  px-20  dark:text-white">Sent Requests</p>
    </div>

    <ul>

        @foreach ($users as $user)
            @if ($user['id'] != $authenticatedUser->id)
                <li
                    class="h-12 bg-transparent flex items-center justify-between pl-4 pr-4 mt-2 pb-2 text-lg border-b border-black dark:border-gray-700">
                    <p class="text-white">{{ $user['name'] }}</p>
                    @foreach ($user->receivedfriendRequests as $request)
                        @if ($request->status == 'pending')
                            <x-request-sent />
                        @else
                            <x-request-accepted />
                        @endif
                    @endforeach
                </li>
            @endif
        @endforeach

    </ul>
</div>
