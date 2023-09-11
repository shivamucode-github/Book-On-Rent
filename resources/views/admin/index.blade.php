<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class="h-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-full bg-white overflow-hidden shadow-sm sm:rounded-lg flex gap-6 justify-between p-4">
                <a href="{{ route('orders') }}" class="bg-green-400 h-1/4 w-full border border-gray-500 rounded-lg shadow-md shadow-gray-500 p-4 flex flex-col gap-2 justify-center items-center">
                    <span class="text-xl font-semibold">Total Orders</span>
                    <span class="text-6xl font-bold">{{ count($orders) }}</span>
                </a>
                <a href="{{ route('users') }}" class="bg-blue-400 h-1/4 w-full border border-gray-500 rounded-lg shadow-md shadow-gray-500 p-4 flex flex-col gap-2 justify-center items-center">
                    <span class="text-xl font-semibold">Total Users</span>
                    <span class="text-6xl font-bold">{{ count($users) }}</span>
                </a>
                <a href="{{ route('books') }}" class="bg-red-400 h-1/4 w-full border border-gray-500 rounded-lg shadow-md shadow-gray-500 p-4 flex flex-col gap-2 justify-center items-center">
                    <span class="text-xl font-semibold">Total Books</span>
                    <span class="text-6xl font-bold">{{ count($books) }}</span>
                </a>
                <div class="bg-yellow-400 h-1/4 w-full border border-gray-500 rounded-lg shadow-md shadow-gray-500 p-4 flex flex-col gap-2 justify-center items-center">
                    <span class="text-xl font-semibold">Total Payments</span>
                    <span class="text-6xl font-bold">{{ $payments->sum() }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
