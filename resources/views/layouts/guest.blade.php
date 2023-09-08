<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen py-6 bg-gradient-to-t from-fuchsia-400 to-blue-100 font-sans text-gray-900 antialiased">
        <x-flash />
        <div class="flex gap-6 justify-end pr-12 py-6 text-lg">
            <a class="hover:text-blue-600" href="/login">Login</a>
            <a class="hover:text-blue-600" href="/register">Resgister</a>
        </div>
        <div class="flex flex-col sm:justify-center items-center -mt-10">
            <div>
                <a href="/" class="w-48 h-48 block">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md -mt-6 px-6 py-4 bg-fuchsia-200 shadow-md shadow-fuchsia-700 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
