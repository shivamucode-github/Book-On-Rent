<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="/admin/book/{{ $book->slug }}/update" class="w-full space-y-4"
                enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$book->name, old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                        :value="$book->price, old('price')" required autocomplete="price" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Category --}}
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Category')" />
                    <select name="category" id="category"
                        class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                        <option value="" disabled>Select One</option>
                        @foreach ($categories as $category)
                            <option {{ $book->category->id == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                {{-- Author --}}
                <div class="mt-4">
                    <x-input-label for="author" :value="__('Author')" />
                    <select name="author" id="author"
                        class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300">
                        <option value="" disabled>Select One</option>
                        @foreach ($authors as $author)
                            <option {{ $book->author->id == $author->id ? 'selected' : '' }}
                                value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('author')" class="mt-2" />
                </div>
                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" class="py-2 px-3 w-full rounded-md bg-gray-100 border-gray-300 text-black" type="description"
                        name="description" row="10" cols="10" required>{{ $book->description }}
                    </textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Thumbnail -->
                <div class="flex">
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image (Cover Photo)')" />

                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Image not available"
                            class="w-48 h-48 object-cover">
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4 gap-6 py-4">
                    <x-primary-button type="submit" class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
