<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="/admin/order/{{ $order->id }}/update" class="w-full">
                @csrf

                {{-- Users --}}
                <div class="mt-4">
                    <x-input-label for="user" :value="__('User')" />
                    <select name="user" id="user" class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                        <option value="" disabled>Select One</option>
                        @foreach ($users as $user)
                            <option {{ $order->user->id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('user')" class="mt-2" />
                </div>

                {{-- Books --}}
                <div class="mt-4">
                    <x-input-label for="book" :value="__('Book')" />
                    <select name="book" id="book"
                        class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                        <option value="" selected disabled>Select One</option>
                        @foreach ($books as $book)
                            <option {{ $order->book->id == $book->id ? 'selected' : '' }} value="{{ $book->id }}">
                                {{ $book->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('book')" class="mt-2" />
                </div>


                <!-- Days -->
                <div>
                    <x-input-label for="days" :value="__('Rent for days')" />
                    <x-text-input id="days" class="block mt-1 w-full" type="number" name="days"
                        :value="$order->days ,old('days')" required autofocus autocomplete="days" />
                    <x-input-error :messages="$errors->get('days')" class="mt-2" />
                </div>

                <!-- Quantity -->
                <div class="mt-4">
                    <x-input-label for="quantity" :value="__('Quantity')" />
                    <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                        :value="$order->quantity, old('quantity')" required autocomplete="quantity" />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                {{-- Price --}}
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input disabled id="price" class="block mt-1 w-full" type="number" name="price"
                        :value="$order->price, old('price')" required autocomplete="price" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 gap-6">
                    <x-primary-button type="submit" class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
