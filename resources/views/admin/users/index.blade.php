<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b-2 px-4 flex items-center justify-between">
                <h1 colspan="7" class="py-3 text-2xl">All Users</h1>
                <div class="flex items-center gap-4" x-cloak
                    @if ($errors->any()) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
                    <form action="#" method="get">
                        <input
                            class="search outline-none border-2 border-gray-300 rounded-md placeholder:text-gray-400 px-4"
                            type="search" id="" placeholder="Search here" name="search">
                    </form>
                    <button x-on:click="open = ! open" class="bg-blue-500 px-6 py-2 rounded-md text-white">Add
                        user</button>
                    <div x-show="open"
                        class="fixed overflow-auto py-6 inset-0 bg-black/60 flex items-center justify-center z-30">
                        <div
                            class="bg-white w-1/3 mt-6 px-6 py-6 flex flex-col items-center justify-center gap-8 rounded-lg">
                            <h2 class="block text-4xl font-semibold">Add user</h2>
                            <form method="POST" action="{{ route('createUser') }}" class="w-full">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>


                                <!-- Phone -->
                                <div class="mt-4">
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone"
                                        :value="old('phone')" required autocomplete="phone" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>


                                <!-- Address -->
                                <div class="mt-4">
                                    <x-input-label for="address" :value="__('Address')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                        :value="old('address')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4 gap-6">
                                    <x-primary-button class="ml-4">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                    <x-danger-button x-on:click="open = ! open">{{ __('Cancel') }}</x-danger-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full bg-white shadow-sm sm:rounded-lg p-4 py-10">
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Id') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Slug') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Role') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Email') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Phone') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Address') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-300">
                    @forelse ($users as $key => $user)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ ucwords($user->name) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $user->slug }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($user->role->name) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($user->email) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($user->phone) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ ucwords($user->address) }}
                            </td>
                            <td x-cloak x-data="{ open: false }"
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex items-center justify-center gap-3">
                                <a href="/admin/user/{{ $user->slug }}/edit" class="text-blue-600">
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
                                {{-- component for conformation of deletion of user by admin --}}
                                <div x-show="open"
                                    class="fixed inset-0 bg-black/60 flex items-center justify-center z-30">
                                    <div
                                        class="bg-white w-1/4 h-1/3 flex flex-col items-center justify-center gap-8 rounded-lg">
                                        <p class="text-lg font-medium">Do you really want to delete the user</p>
                                        <div class="flex items-center gap-8 py-6">
                                            <a class="px-6 py-3 bg-red-500 text-white font-medium text-md"
                                                href="/admin/user/{{ $user->slug }}/delete">Yes</a>
                                            <button class="px-6 py-2.5 bg-blue-500 text-white font-medium text-md"
                                                x-on:click="open = ! open">No</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border-2 text-center py-4 font-semibold text-lg">No user Yet
                            </td>
                        </tr>
                    @endforelse ()
                </tbody>
            </table>
        </div>
        <div class="py-2 px-4 w-full">
            {{ $users->links() }}
        </div>
    </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
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
    </script> --}}
</x-app-layout>
