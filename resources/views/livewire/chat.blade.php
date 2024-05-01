<div class=" flex bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 
dark:via-transparent border rounded-lg border-gray-200 
dark:border-gray-700 max-h-96 shadow-xl "
    style="min-height: 400px">

    {{-- friend List --}}
    <div class="w-3/12 bg-gray-700 bg-opacity-25 border-r overflow-y-scroll border-gray-700">
        <ul class="">
            @foreach ($users as $user)
                <li wire:click="getUserMessages({{ $user['id'] }})"
                    class="p-6 cursor-pointer text-lg dark:text-white text-gray-600 font-semibold border-b border-gray-700 hover:bg-gray-800">
                    <p class="flex items-center">{{ $user['name'] }}
                        <span class="ml-2 w-2 h-2  bg-blue-500 rounded-full"></span>
                    </p>
                </li>
            @endforeach



        </ul>
    </div>

    {{-- Chat box --}}
    <div class="w-9/12 flex flex-col justify-between">

        {{-- Messages --}}

        <div class="w-full p-6 flex flex-col overflow-y-scroll">

            {{-- <div class="w-full mb-3 text-right">
                <p class="inline-block p-2 rounded-md   dark:text-white bg-indigo-300 bg-opacity-25"
                    style="max-width: 75%">
                    Olá
                </p>
                <span class="block mt-1 text-xs dark:text-white">27/04/2024 20:09</span>
            </div>


            <div class="w-full mb-3 ">
                <p class="inline-block p-2 rounded-md dark:text-white bg-gray-300 bg-opacity-25 "
                    style="max-width: 75%">
                    lorem
                </p>
                <span class="block mt-1 text-xs dark:text-white">27/04/2024 20:09</span>
            </div>

             --}}
            @if ($messages)
                @foreach ($messages as $message)
                    <livewire:sent-message :$message :key="$message['id']" />
                @endforeach
            @else
                <h3>No messages bro hahah</h3>
            @endif
        </div>
        {{-- form box --}}
        <div class="w-full bg-gray-700 bg-opacity-25 p-6 border-t border-gray-700">
            <form wire:submit="sendMessage">
                <div class="flex rounded-md overflow-hidden border border-gray-700">
                    <input wire:model="value" type="text" class="flex-1 px-4 py-2 text-sm focus:outline-none">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-800 dark:text-white px-4 py-2">Send</button>
                </div>
            </form>
        </div>
    </div>

























    {{-- <div class="w-1/3 rounded shadow-lg h-full ">
        <ul class="space-y-1 overflow-y-scroll">
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            <li
                class="h-20 bg-gray-700 rounded flex cursor-pointer justify-center items-center shadow-lg hover:bg-gray-600">
                <p class="font-bold text-xl dark:text-white ">Nome</p>
            </li>
            
        </ul>
    </div>
    
    <div class="w-2/3 flex right-0 bottom-0 absolute rounded bg-white min-h-14">
        <input class="w-full  bg-gray-700 text-white focus:border-transparent"
            type="text">
        <button class="w-36 border-0 dark:text-white hover:bg-violet-600  bg-violet-500">Send</button>
    </div> --}}
</div>


{{-- <div class="w-2/3 flex justify-between ">
    <div class="bg-gray-700 h-10 w-28 mt-10 ml-4 flex justify-center items-center rounded-full">
        <p class="dark:text-white ">Mensagem</p>
    </div>

    <div class="bg-violet-800 min-h-10 h-auto max-w-28 w-28 mt-20 mr-4 flex justify-center items-center rounded-full">
        <p class="dark:text-white "></p>
    </div>
</div> --}}
