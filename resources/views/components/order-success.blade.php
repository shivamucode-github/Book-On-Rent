@if (session()->has('orderSuccess'))
    <div x-cloak x-data="{ open: true }" x-init="setTimeout(() => open = false, 2000)">
        <div x-show="open" class="bg-black/50 fixed inset-0 z-20 flex justify-center items-center">
            <div class="bg-white w-1/2 h-1/2 rounded-md flex flex-col gap-10 justify-center items-center">
                <h2 class="text-green-500 text-4xl font-semibold flex items-center">
                    <svg class="w-14 h-14" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                        <path
                            d="M24 4L29.2533 7.83204L35.7557 7.81966L37.7533 14.0077L43.0211 17.8197L41 24L43.0211 30.1803L37.7533 33.9923L35.7557 40.1803L29.2533 40.168L24 44L18.7467 40.168L12.2443 40.1803L10.2467 33.9923L4.97887 30.1803L7 24L4.97887 17.8197L10.2467 14.0077L12.2443 7.81966L18.7467 7.83204L24 4Z"
                            fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M17 24L22 29L32 19" stroke="#fff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    ORDER SUCCESSFULLY !
                </h2>
                <div class="flex flex-col gap-2 justify-center items-center">
                    <p class="text-blue-500">Your Transaction ID is: {{ $payment->transaction_id }}</p>
                    <p class="text-blue-500 text-2xl font-bold">Your Order Number is :
                        #<span>{{ $payment->order }}</span>
                    </p>
                    <a href="/orders"
                        class="inline-flex items-center gap-2 font-semibold bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                        </svg>
                        {{ __('Check Order') }}
                    </a>
                </div>
                <p class="text-center">Thanking you for order from our website <span class="block">Visit Again</span>
                </p>
            </div>
        </div>
    </div>
@endif
