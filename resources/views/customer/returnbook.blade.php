@extends('customer.layout.main')
@section('main')
    <main class="bg-white py-6">
        <section
            class="px-10 py-8 max-w-7xl m-auto h-full bg-gray-200 rounded-2xl my-6 flex flex-col items-center justify-center items-start gap-8">
            <form class="flex flex-col gap-3 justify-center items-start px-16 py-6 border border-gray-400 rounded-lg"
                action="/return" method="post">
                @csrf
                <div>
                    <x-input-label for="rentId" :value="__('Enter the Rental Id')" />
                    <x-text-input id="rentId" class="block mt-1 w-full" type="text" name="rentId" :value="old('rentId')"
                        required autofocus autocomplete="rentId" />
                    <x-input-error :messages="$errors->get('rentId')" class="mt-2" />
                </div>
                <button class="px-6 py-2 bg-blue-500 text-white rounded-md">Submit</button>
            </form>
            @isset($order)
                <section class="bg-slate-300 rounded-lg w-full py-4 px-10">
                    <h2 class="py-2 border-b border-gray-400 text-2xl font-medium">Order Details</h2>
                    <table class="block py-4 w-full">
                        <tr>
                            <td>Order ID</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">{{ $order->id }}</td>
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
                        <tr class="border-t-2 border-dashed border-gray-400 w-full">
                            <td>Total Rental Price</td>
                            <td><span>:</span></td>
                            <td class="px-4 py-2">Rs {{ $order->price }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="px-6 py-2 bg-red-500 text-white font-medium rounded-lg">Return Book</button>
                            </td>
                        </tr>
                    </table>
                </section>
            @endisset
        </section>
    </main>
@endsection
