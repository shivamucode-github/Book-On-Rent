@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | CheckOut</title>
@endpush
@section('main')
    <div class="relative {{ $errors->all() ? 'block' : 'hidden' }}" x-data="{ open: true }" x-init="setTimeout(() => open = false, 3000)">
        <div x-show="open" class="absolute z-40 top-2 right-4 w-1/2 bg-red-200 border border-red-500 rounded-lg px-8 py-2">
            <x-input-error :messages="$errors->all()" />
            <button x-on:click="open = ! open">
                <svg class="z-50 w-8 absolute top-3 right-3 h-8 hover:text-green-500 font-bold"
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <section class="max-w-4xl m-auto py-10">
        @if ($orders->isNotEmpty())
            <div class="flex items-center justify-between border-b border-black ">
                <h1 class="text-3xl font-semibold py-2">Order Items ({{ count($orders) }})</h1>
                <form action="{{ route('stripe.index', ['cartCheckout' => encrypt($payments->sum())]) }}" method="post">
                    @csrf
                    <button type="submit"
                        class="block text-center bg-indigo-500 font-semibold hover:bg-indigo-600 px-6 py-3 text-sm text-white uppercase w-full">Pay
                        Now
                        ({{ $payments->sum() }})</button>
                </form>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">{{ __('Product Details') }}</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">{{ __('Quantity') }}</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">{{ __('Days') }}</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">{{ __('Price') }}</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">{{ __('Total') }}</h3>
            </div>
        @endif
        @forelse ($orders as $key => $order)
            <!-- product -->
            <div class="productDiv flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-2/5">
                    <div class="w-36">
                        <a href="/item/{{ $order->book->slug }}/show">
                            <img class="text-sm h-36 w-full object-contain"
                                src="{{ asset('storage/' . $order->book->thumbnail) }}" alt="image not available">
                        </a>
                    </div>
                    <div x-cloak x-data="{ open: false }" class="flex flex-col justify-between ml-4 flex-grow">
                        <div class="flex flex-col gap-1">
                            <span class="font-semibold text-sm text-gray-500">
                                {{ __('Item :') }} #{{ $key + 1 }}
                            </span>
                            <span class="font-bold text-sm">{{ $order->book->name }}</span>
                            <span class="text-red-500 text-xs">{{ $order->book->category->name }}</span>
                        </div>
                        <button x-on:click="open = ! open" class="text-red-500 text-sm flex gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            <span>{{ __('Remove') }}</span>
                        </button>
                        {{-- component for conformation of deletion of book by admin --}}
                        <div x-show="open" class="fixed inset-0 bg-black/60 flex items-center justify-center z-30">
                            <div class="bg-white w-1/4 h-1/3 flex flex-col items-center justify-center gap-8 rounded-lg">
                                <p class="text-lg font-medium">Do you really want to delete the book</p>
                                <div class="flex items-center gap-8 py-6">
                                    <a class="px-6 py-3 bg-red-500 text-white font-medium text-md"
                                        href="/cart/{{ $order->order_num }}/delete">Yes</a>
                                    <button class="px-6 py-2.5 bg-blue-500 text-white font-medium text-md"
                                        x-on:click="open = ! open">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($order->book->deleted_at == null)
                    {{-- Quantity --}}
                    <div class="w-1/5 text-center">
                        <span class="border border-gray-600 py-2 px-4">{{ $order->quantity }}</span>
                    </div>

                    {{-- Days --}}
                    <div class="w-1/5 text-center">
                        <span class="border border-gray-600 py-2 px-4">{{ $order->days }}</span>
                    </div>
                    <div class="w-1/5 text-center">
                        <span class="text-center font-semibold text-sm">Rs
                            {{ $order->book->price }}</span>
                    </div>
                    <div class="w-1/5 text-center">
                        <span class="text-center w-1/5 font-semibold text-sm">Rs {{ $order->price }}</span>
                    </div>
                @else
                    <p class="text-red-500 font-semibold">Book is no longer available! please remove this item
                    </p>
                @endif
            </div>
        @empty
            <div class="w-full text-center py-10">
                <p class="text-5xl font-semibold">No Item Yet</p>
            </div>
        @endforelse
    </section>
@endsection
