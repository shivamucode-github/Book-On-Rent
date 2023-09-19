<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b-2 px-4 flex items-center justify-between">
                <h1 colspan="7" class="py-3 text-2xl">All Order Against Payment</h1>
                <span class="text-lg font-medium">Payment ID : <span
                        class="text-xl font-semibold text-gray-500">{{ $payment->transaction_id }}</span></span>
            </div>
        </div>
        <div class="h-full bg-white shadow-sm sm:rounded-lg p-4">
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('SR No.') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Book Name') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Book Image') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Book Price') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Days') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Quantity') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Total Price') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-200 text-center">
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $key + 1 }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->book->name }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $order->book->thumbnail) }}" alt="Image not available"
                                    class="w-40 h-52 object-center object-cover">
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ 'Rs ' . $order->book->price }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->days }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->quantity }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ 'Rs ' . $order->price }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-2 px-4 w-full">
            {{-- {{ $orders->links() }} --}}
        </div>
    </div>
    </div>
</x-app-layout>
