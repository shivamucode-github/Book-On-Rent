<div class="group relative px-4 py-2">
    <button class="hover:text-blue-500 block">Authors</button>
    <div
        class="hidden group-hover:block z-10 w-40 absolute -top-2 left-24 border border-gray-400 max-h-48 overflow-auto bg-gray-200 rounded-lg py-3">
        <a href="/"
            class="@if (!$currentAuthor) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
            All
        </a>
        @foreach ($authors as $author)
            <a href="/books?author={{ $author->slug }}"
                class="@if ($currentAuthor == $author->id) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
                {{ $author->name }}
            </a>
        @endforeach
    </div>
</div>
