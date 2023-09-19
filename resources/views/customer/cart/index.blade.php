<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #summary {
            background-color: #f6f6f6;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">{{ count($orders) }} Items</h2>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity
                    </h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Days
                    </h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                </div>
                @forelse ($orders as $key => $order)
                    <div class="productDiv flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5"> <!-- product -->
                            <div class="w-36">
                                <a href="/item/{{ $order->book->slug }}/show">
                                    <img class="text-sm h-36 w-full object-cover"
                                        src="{{ asset('storage/' . $order->book->thumbnail) }}"
                                        alt="image not available">
                                </a>
                            </div>
                            <div x-data="{ open: false }" class="flex flex-col justify-between ml-4 flex-grow">
                                <div class="flex flex-col gap-1">
                                    <span class="font-semibold text-lg text-gray-500">Order Id:
                                        #{{ $order->id }}</span>
                                    <span class="font-bold text-sm">{{ $order->book->name }}</span>
                                    <span class="text-red-500 text-xs">{{ $order->book->category->name }}</span>
                                </div>
                                <button x-on:click="open = ! open" class="text-red-500 text-sm flex gap-2">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Remove</span>
                                </button>
                                {{-- component for conformation of deletion of book by admin --}}
                                <div x-show="open"
                                    class="fixed inset-0 bg-black/60 flex items-center justify-center z-30">
                                    <div
                                        class="bg-white w-1/4 h-1/3 flex flex-col items-center justify-center gap-8 rounded-lg">
                                        <p class="text-lg font-medium">Do you really want to delete the book</p>
                                        <div class="flex items-center gap-8 py-6">
                                            <a class="px-6 py-3 bg-red-500 text-white font-medium text-md"
                                                href="/cart/{{ $order->id }}/delete">Yes</a>
                                            <button class="px-6 py-2.5 bg-blue-500 text-white font-medium text-md"
                                                x-on:click="open = ! open">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Quantity --}}
                        <div class="flex justify-center items-center gap-3 w-1/5 quantityDiv">
                            <span class="orderId hidden">{{ $order->id }}</span>
                            <button class="decrementQty text-xl">-</button>
                            <input disabled type="number" class="quantity w-16" value="{{ $order->quantity }}">
                            <button class="incrementQty">+</button>
                        </div>

                        {{-- Days --}}
                        <div class="flex justify-center items-center gap-3 w-1/5 text-lg">
                            <button class="decrementDays">-</button>
                            <input disabled type="number" class="days w-16" value="{{ $order->days }}">
                            <button class="incrementDays">+</button>
                        </div>

                        <span class="text-center w-1/5 font-semibold text-sm">Rs {{ $order->book->price }}.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">Rs {{ $order->price }}</span>
                    </div>
                @empty
                    <div class="w-full text-center py-10">
                        <p class="text-5xl font-semibold">No Item Yet</p>
                    </div>
                @endforelse

                <a href="/" class="inline-flex font-semibold text-indigo-600 text-sm mt-10">

                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{ count($orders) }}</span>
                    <span class="font-semibold text-sm">Rs {{ $payments->sum() }}</span>
                </div>
                {{-- <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                    <select class="block p-2 text-gray-600 w-full text-sm">
                        <option>Standard shipping - Rs10.00</option>
                    </select>
                </div>
                <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                    <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
                </div> --}}
                {{-- <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button> --}}
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>Rs {{ $payments->sum() }}</span>
                    </div>
                    <a href="/stripe/payment" class="block text-center bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.productDiv').each(function() {
                var decrementQty = $(this).find(".decrementQty");
                var incrementQty = $(this).find(".incrementQty");
                var decrementDays = $(this).find(".decrementDays");
                var incrementDays = $(this).find(".incrementDays");

                var slug = $(this).find('.orderId').html();
                var quantity = $(this).find(".quantity");
                var days = $(this).find(".days");
                var quantityValue = quantity.val();
                var daysValue = days.val();

                decrementQty.click(function(e) {
                    if (quantityValue > 1) {
                        quantityValue--;
                        quantity.val(quantityValue);
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/cart/" + slug + "/update",
                        data: {
                            'quantity': quantityValue,
                            'days': daysValue,
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });

                incrementQty.click(function(e) {
                    if (quantityValue < 20) {
                        quantityValue++;
                        quantity.val(quantityValue);
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/cart/" + slug + "/update",
                        data: {
                            'quantity': quantityValue,
                            'days': daysValue,
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });

                decrementDays.click(function(e) {
                    if (daysValue > 1) {
                        daysValue--;
                        days.val(daysValue);
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/cart/" + slug + "/update",
                        data: {
                            'quantity': quantityValue,
                            'days': daysValue,
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });

                incrementDays.click(function(e) {
                    if (daysValue < 20) {
                        daysValue++;
                        days.val(daysValue);
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/cart/" + slug + "/update",
                        data: {
                            'quantity': quantityValue,
                            'days': daysValue,
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });
            });
        });
    </script>
</body>
