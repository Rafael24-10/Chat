<div class="w-full mb-3 text-right">
    <p class="inline-block p-2 rounded-md   dark:text-white bg-indigo-300 bg-opacity-25" style="max-width: 75%">
        {{ $message['content'] }}
    </p>
    <span class="block mt-1 text-xs dark:text-white">{{ \Carbon\Carbon::parse($message['created_at'])->format('Y-m-d H:i:s')  }}</span>
</div>
