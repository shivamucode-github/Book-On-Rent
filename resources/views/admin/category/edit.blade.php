<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8">
            <form action="/admin/category/{{ $category->slug }}/update" method="POST" class="flex flex-col gap-6">
                @csrf
                <div class="flex flex-col items-start gap-1 text-lg font-base">
                    <label for="name">Category Name</label>
                    <input required type="text" id="name" name="name" value="{{ $category->name, old('name') }}"
                        class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                    @error('name')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex items-center gap-8">
                    <x-primary-button type="submit" class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button></div>
            </form>
        </div>
    </div>
</x-app-layout>
