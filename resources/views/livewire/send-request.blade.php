<div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 
dark:via-transparent border rounded-lg border-gray-200 
dark:border-gray-700 max-h-96 w-5/12 shadow-xl overflow-y-auto "
    style="min-height: 400px">
    <div class="w-full h-16 bg-transparent flex items-center justify-center border-b border-gray-700">
        <p class="text-2xl font-bold dark:text-white">Users</p>
    </div>
    <ul>
        @foreach ($users as $user)
            <li
                class="h-12 bg-transparent flex items-center justify-between pl-4 pr-4 mt-2 pb-2 text-lg border-b border-black dark:border-gray-700">
                <p class="text-white">{{ $user['name'] }}</p>
                <button wire:click="makeRequest({{ $user['id'] }})"
                    class="bg-indigo-600 hover:bg-indigo-800 dark:text-white px-4 py-2 rounded-lg">Add
                    friend</button>
            </li>
        @endforeach
    </ul>
</div>
