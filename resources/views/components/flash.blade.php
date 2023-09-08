@if (session()->has('error'))
    <div x-data="{ open: true }"  x-init="setTimeout(() => open = false, 2000)" class="absolute right-4 top-28 z-20">
        <div x-show="open" class="py-4 px-8 pr-4 border border-red-400 bg-red-100 rounded-lg flex items-center gap-6">
            <span class="text-red-600">{{ session('error') }}</span>
            <button x-on:click="open = ! open">
                <svg class="w-8 h-8 hover:text-red-500 font-bold" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div x-data="{ open: true }"  x-init="setTimeout(() => open = false, 2000)" class=" absolute right-4 top-28 z-20">
        <div x-show="open" class=" py-4 px-8 pr-4 border border-green-400 bg-green-100 rounded-lg flex items-center gap-6">
            <span class="text-green-600">{{ session('success') }}</span>
            <button x-on:click="open = ! open">
                <svg class="w-8 h-8 hover:text-green-500 font-bold" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
@endif
