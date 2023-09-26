<div class="group relative px-4 py-2">
    <button class="hover:text-blue-500">Category</button>
    <div
        class="hidden group-hover:block z-10 w-40  absolute top-0 left-24 max-h-48 overflow-auto bg-gray-200 rounded-lg border border-gray-400 py-2">
        <a href="/books?category={{ request('author') ? '&author=' . request('author') : '' }}{{ request('search') ? '&search=' . request('search') : '' }}"
            class=" hover:bg-blue-500 px-3 block py-1">
            {{ __('All') }}
        </a>
        @forelse ($categories as $category)
            <a href="/books?category={{ $category->slug }}{{ request('author') ? '&author=' . request('author') : '' }}{{ request('search') ? '&search=' . request('search') : '' }}"
                class="@if ($currentCategory == $category) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
                {{ $category->name }}
            </a>
        @empty
            <p class="block text-center text-sm">No Categories Yet</p>
        @endforelse ()
    </div>
</div>
