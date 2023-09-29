@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | Return Book</title>
@endpush
@section('main')
    <main class="bg-white py-6">
        <section
            class="px-10 py-8 max-w-7xl m-auto h-full bg-gray-200 rounded-2xl my-6 flex flex-col items-center justify-center gap-8">
            <form class="flex flex-col gap-3 justify-center items-start px-16 py-6 border border-gray-400 rounded-lg"
                action="/return" method="post">
                @csrf
                <div>
                    <x-input-label for="rentId" :value="__('Enter the Order Id')" />
                    <x-text-input id="rentId" class="block mt-1 w-full" type="text" name="rentId" :value="old('rentId')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('rentId')" class="mt-2" />
                </div>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md">Submit</button>
            </form>
            @isset($order)
                <section class="bg-slate-300 rounded-lg w-full py-4 px-10">
                    <h2 class="py-2 border-b border-gray-400 text-2xl font-medium">Order Details</h2>
                    <table class="block py-4 w-full">
                        <tr>
                            <td>Order ID</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->order_num }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Book Name</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->book->name }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->book->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->book->author->name }}</td>
                        </tr>
                        <tr>
                            <td>Book Price</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">Rs {{ $order->book->price }}</td>
                        </tr>
                        <tr>
                            <td>Copies of Book</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->quantity }} Copies</td>
                        </tr>
                        <tr>
                            <td>Days for Rent</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->days }} Days</td>
                        </tr>
                        <tr class="border-t-2 border-dashed border-gray-400 w-full pt-3">
                            <td>Total Rental Price</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">Rs {{ $order->price }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="pb-3">
                                @if (!$order->days)
                                    <span class="text-lg text-green-500 font-semibold">Book Buyed</span>
                                @elseif ($order->return_at)
                                    <span class="text-lg text-green-500 font-semibold">Book Returned</span>
                                @else
                                    <form action="{{ route('returnBook') }}" method="post">
                                        @csrf
                                        <input hidden type="number" name="id" value="{{ $order->order_num }}">
                                        <button type="submit"
                                            class="px-6 py-2 bg-red-500 text-white font-medium rounded-lg">Return Book</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @isset($days)
                            <tr class="border-t-2 border-dashed border-gray-400 w-full pt-3">
                                <td colspan="2">
                                    <p class="text-sm text-red-500 font-semibold">
                                        You extended {{ $days }} days for returning book Per day charge is Rs 10 Now you
                                        have to Pay {{ $balance }}
                                    </p>
                                </td>
                                <td class="px-4 py-2">
                                    <form
                                        action="{{ route('stripe.index', ['returnBook' => encrypt($order->id), 'balance' => encrypt($balance)]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit"
                                            class="block text-center bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Pay
                                            Now</button>
                                    </form>
                                </td>
                            </tr>
                        @endisset
                    </table>
                </section>
            @endisset
        </section>
    </main>
@endsection
