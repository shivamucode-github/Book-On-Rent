@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | Order Details</title>
@endpush
@section('main')
    <main>
        <section class="bg-white shadow-sm sm:rounded-lg p-4 pb-12">
            <div class="flex items-center justify-between">
                <a href="/orders" class="py-2 px-3 rounded-lg my-3 text-blue-500 inline-flex bg-gray-200">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    <span>
                        Back To Orders
                    </span>
                </a>
                <p class="text-lg text-slate-500">Transaction ID: #{{ $payment->transaction_id }}</p>
            </div>
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('SR No.') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Order Id') }}
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
                    @forelse ($orders as $key => $order)
                        <tr>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $key + 1 }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->order_num }}
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
                                {{ $order->days ? $order->days : 'Buyed' }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->quantity }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ 'Rs ' . $order->price }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <tr>
                            <td colspan="8" class="border-2 text-center py-4 font-semibold text-lg">No Record Yet
                            </td>
                        </tr>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
@endsection
