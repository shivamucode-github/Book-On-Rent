@props(['active'])

@php
$classes = ($active ?? false)
            ? 'w-full flex items-center px-2 py-2 border-l-4 border-indigo-400 text-lg font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'w-full flex items-center px-2 py-2 border-l-4 border-transparent text-lg font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
