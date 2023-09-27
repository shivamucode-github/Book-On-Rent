<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Book On Rent | Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-flash />
        <main class=" bg-gray-100">
            <header class="fixed inset-x-0 top-0 z-10 border-b-2 border-gray-300">
                @include('layouts.header')
            </header>
            <aside class="fixed pt-28 top-0 w-56 bg-gray-200 inset-y-0 border-r-2 border-gray-300">
                @include('layouts.navigation')
            </aside>
            <!-- Page Content -->
            <section class="ml-56 pt-28">
                {{ $slot }}
            </section>
        </main>
    </body>
</html>
