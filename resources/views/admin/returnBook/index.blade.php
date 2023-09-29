<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 h-screen">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b-2 px-4 flex items-center justify-between">
                <h1 colspan="7" class="py-3 text-2xl">All Orders Status</h1>
            </div>
        </div>
        <div class="h-full bg-white shadow-sm sm:rounded-lg py-4 px-8">
            <table class="min-w-full">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Sr No.') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Order No.') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Transaction Id') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('User Name & Slug') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Book Name & Slug') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Order Date') }}
                        </th>
                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                            {{ __('Status') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-300">
                    @forelse ($orders as $key => $order)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->order_num }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->paidOrder->payment->transaction_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->user->name . ' & ' . $order->user->slug }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->book->name . ' & ' . $order->book->slug }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->created_at->format('d-M-Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                @if ($order->days == null && $order->return_at == null)
                                    <p class="text-blue-600 text-base">{{ __('Book Buyed') }}</p>
                                @elseif ($order->return_at != null)
                                    <p class="text-green-600 text-base">{{ __('Book Returned') }}</p>
                                @else
                                    <p class="text-red-600 text-base">{{ __('Book Not Returned') }}</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-2 text-center py-4 font-semibold text-lg">No Order Yet
                            </td>
                        </tr>
                    @endforelse ()
                </tbody>
            </table>
        </div>
        <div>
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
