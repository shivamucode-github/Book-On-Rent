<div class="group relative px-4 py-2">
    <button class="hover:text-blue-500">Category</button>
    <div class="hidden group-hover:block z-10 w-40  absolute -top-2 left-24 max-h-48 overflow-auto bg-gray-200 rounded-lg border border-gray-400 py-3">
        <a href="/"
            class="@if (!$currentCategory) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
            All
        </a>
        @foreach ($categories as $category)
            <a href="/books?category={{ $category->slug }}"
                class="@if ($currentCategory == $category) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
