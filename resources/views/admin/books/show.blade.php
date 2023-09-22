<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-start justify-center gap-6 bg-gray-300 px-6 py-4 rounded-lg">
                <div class="h-full">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $book->thumbnail) }}"
                        alt="Image not available">
                </div>
                <div class="flex flex-col gap-3 items-start">
                    <div>
                        <span class="text-lg font-medium">Name :</span>
                        <span>{{ $book->name }}</span>
                    </div>

                    <div>
                        <span class="text-lg font-medium">Price :</span>
                        <span class="text-2xl font-semibold">{{ 'Rs '.$book->price }}</span>
                    </div>
                    <div>
                        <span class="text-lg font-medium">Author :</span>
                        <span>{{ $book->author->name }}</span>
                    </div>
                    <div>
                        <span class="text-lg font-medium">Category :</span>
                        <span>{{ $book->category->name }}</span>
                    </div>
                    <div>
                        <span class="text-lg font-medium">Description :</span>
                        <span>{{ $book->description }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
