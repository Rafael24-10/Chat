<div class=" flex bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 
dark:via-transparent border rounded-lg border-gray-200 
dark:border-gray-700 max-h-96 shadow-xl"
    style="min-height: 400px">

    {{-- friend List --}}

    <div class="w-3/12 bg-gray-700 bg-opacity-25 border-r overflow-y-auto border-gray-700">

        @if (count($friends) == 0)
            <div class="flex items-center justify-center py-4">
                <h2 class="text-white">You don't have any friends yet. :( </h2>
            </div>
        @else
            <ul class="">
                @foreach ($friends as $friend)
                    @if ($selectedUser == $friend['id'])
                        <li wire:click="getUserMessages({{ $friend['id'] }})"
                            class="p-6 cursor-pointer text-lg dark:text-white bg-gray-800 text-gray-600 font-semibold border-b border-gray-700 hover:bg-gray-700">
                            <p class="flex items-center">{{ $friend['name'] }}
                                <span class="ml-2 w-2 h-2  bg-blue-500 rounded-full"></span>
                            </p>
                        </li>
                    @else
                        <li wire:click="getUserMessages({{ $friend['id'] }})"
                            class="p-6 cursor-pointer text-lg dark:text-white text-gray-600 font-semibold border-b border-gray-700 hover:bg-gray-700">
                            <p class="flex items-center">{{ $friend['name'] }}
                                <span class="ml-2 w-2 h-2  bg-blue-500 rounded-full"></span>
                            </p>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>


    {{-- Chat box --}}
    <div class="w-9/12 flex flex-col justify-between ">

        {{-- Messages --}}

        <div class="w-full p-6 flex flex-col overflow-y-auto">


            @if ($messages)
                @foreach ($messages as $message)
                    @if ($message['sentFrom'] == $authenticatedUser->id)
                        <livewire:sent-message :$message :key="$message['id']" />
                    @elseif($message['sentFrom'] == $selectedUser)
                        <livewire:received-message :$message :key="$message['id']" />
                    @endif
                @endforeach
            @else
                <x-no-messages />
            @endif
        </div>

        @if ($selectedUser != null)
            {{-- form box --}}
            <div class="w-full bg-gray-700 bg-opacity-25 p-6 border-t border-gray-700">
                <form wire:submit="sendMessage">
                    <div class="flex rounded-md overflow-hidden border border-gray-700">
                        <input wire:model="value" type="text" class="flex-1 px-4 py-2 text-sm focus:outline-none"
                            placeholder="Type a message">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-800 dark:text-white px-4 py-2">Send</button>
                    </div>
                </form>
            </div>
        @else
        @endif
    </div>
    @script
        <script>
            $wire.on('newMessage', (Ids) => {
                Ids.sort();
                try {
                    window.Echo.private('chat.' + Ids[0] + '.' + Ids[1])
                        .listen('SendMessage', (e) => {
                            console.log(e.message);
                        });
                } catch (error) {
                    console.error('An error occurred:', error);
                }
            })
        </script>
    @endscript
