<div>
    <button class="hover:text-blue-500" href="#" x-on:click="open = ! open">Category</button>
    <div x-show="open" class="z-10 w-40 absolute -left-3 top-7 max-h-48 overflow-auto bg-gray-200 rounded-lg py-3">
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
