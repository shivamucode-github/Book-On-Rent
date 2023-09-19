@extends('customer.layout.main')
@section('main')
    <main>
        <section class="h-screen bg-white px-12 py-6">
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('SR No.') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Transaction ID') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Status') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Price') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Date') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-300">
                    @forelse ($orders as $key => $order)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $key + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->transaction_id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->status }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ 'Rs ' . ucwords($order->amount) }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $order->created_at->format('d-M-Y') }}
                            </td>
                            <td x-data="{ open: false }"
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex items-center justify-center gap-3">
                                <a href="/order/{{ $order->slug }}/show" class="text-yellow-500">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                        fill="currentColor">
                                        <defs></defs>
                                        <title>view--filled</title>
                                        <circle cx="16" cy="16" r="4"></circle>
                                        <path
                                            d="M30.94,15.66A16.69,16.69,0,0,0,16,5,16.69,16.69,0,0,0,1.06,15.66a1,1,0,0,0,0,.68A16.69,16.69,0,0,0,16,27,16.69,16.69,0,0,0,30.94,16.34,1,1,0,0,0,30.94,15.66ZM16,22.5A6.5,6.5,0,1,1,22.5,16,6.51,6.51,0,0,1,16,22.5Z">
                                        </path>
                                        <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>"
                                            class="cls-1" width="32" height="32" style="fill:none"></rect>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-2 text-center py-4 font-semibold text-lg">No order Yet
                            </td>
                        </tr>
                    @endforelse ()
                </tbody>
            </table>
        </section>
    </main>
@endsection
