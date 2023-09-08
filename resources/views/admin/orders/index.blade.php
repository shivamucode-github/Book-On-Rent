<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b-2 px-4 flex items-center justify-between">
                <h1 colspan="7" class="py-3 text-2xl">All Orders</h1>
                <div @if ($errors->any()) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
                    <button x-on:click="open = ! open" class="bg-blue-500 px-6 py-2 rounded-md text-white">Add
                        Order</button>
                    <div x-show="open"
                        class="fixed overflow-auto py-6 inset-0 bg-black/60 flex items-center justify-center z-30">
                        <div
                            class="bg-white w-1/3 mt-6 px-6 py-3 flex flex-col items-center justify-center gap-8 rounded-lg">
                            <h2 class="block text-4xl font-semibold">Add Order</h2>
                            <form method="POST" action="{{ route('createBook') }}" class="w-full">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Price -->
                                <div class="mt-4">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                                        :value="old('price')" required autocomplete="price" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                {{-- Category --}}
                                <div class="mt-4">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select name="category" id="category" class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                {{-- Author --}}
                                <div class="mt-4">
                                    <x-input-label for="author" :value="__('Author')" />
                                    <select name="author" id="author" class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('author')" class="mt-2" />
                                </div>

                                <!-- Thumbnail -->
                                <div class="mt-4">
                                    <x-input-label for="thumbnail" :value="__('Thumbnail (Cover Photo)')" />

                                    <x-text-input id="thumbnail" class="block mt-1 w-full" type="file"
                                        name="thumbnail" autocomplete="thumbnail" />

                                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4 gap-6">
                                    <x-primary-button class="ml-4">
                                        {{ __('Add') }}
                                    </x-primary-button>
                                    <x-danger-button x-on:click="open = ! open">{{ __('Cancel') }}</x-danger-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full bg-white overflow-y-hidden shadow-sm sm:rounded-lg p-4">
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Id') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('User Name') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Book Name') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Price') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Quantity') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Rent For Days') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-300">
                    @forelse ($orders as $key => $order)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ ucwords($order->name) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->slug }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($order->thumbnail) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($order->price) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($order->author_id) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($order->category_id) }}
                            </td>
                            <td x-data="{ open: false }"
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex items-center justify-center gap-3">
                                <a href="/order/{{ $order->slug }}" class="text-green-300">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="/admin/order/{{ $order->slug }}/edit" class="text-blue-600">
                                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) -->
                                        <path
                                            d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                                        </path>
                                    </svg>
                                </a>
                                <button x-on:click="open = ! open" class="text-red-500">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                                {{-- component for conformation of deletion of order by admin --}}
                                <div x-show="open"
                                    class="fixed inset-0 bg-black/60 flex items-center justify-center z-30">
                                    <div
                                        class="bg-white w-1/4 h-1/3 flex flex-col items-center justify-center gap-8 rounded-lg">
                                        <p class="text-lg font-medium">Do you really want to delete the order</p>
                                        <div class="flex items-center gap-8 py-6">
                                            <a class="px-6 py-3 bg-red-500 text-white font-medium text-md"
                                                href="/admin/order/{{ $order->slug }}/delete">Yes</a>
                                            <button class="px-6 py-2.5 bg-blue-500 text-white font-medium text-md"
                                                x-on:click="open = ! open">No</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border-2 text-center py-4 font-semibold text-lg">No order Yet
                            </td>
                        </tr>
                    @endforelse ()
                </tbody>
            </table>
        </div>
        <div class="py-2 px-4 w-full">
            {{ $orders->links() }}
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#createUser').on('click', function() {
                var xhr = new XMLHttpRequest();
                var resourceId = $('.slug').val();
                var url = '/change-status/' + resourceId;
                xhr.open("GET", url, false);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                xhr.send();
                var data = JSON.parse(xhr.response);
                if (data.statuscode == 200) {
                    //    alert('kk');
                    alert(data.success);;
                } else {
                    toastr.error(data.message);
                }
                // var resourceId = $('.slug').val(); // Replace with your resource ID
                // $.ajax({
                //     type: 'POST',
                //     url: '/change-status/' + resourceId,
                //     data: {
                //         _token: '{{ csrf_token() }}' // Add CSRF token for security
                //     },
                //     success: function(data) {
                //         alert(data.message);
                //         // Handle success, update UI, etc.
                //     },
                //     error: function(xhr, status, error) {
                //         console.error(error);
                //         // Handle error
                //     }
                // });
            });
        });
    </script>
</x-app-layout>
