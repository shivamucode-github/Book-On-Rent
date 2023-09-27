@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | Details</title>
@endpush
@section('main')
    <main class="bg-white py-6">
        <section class="px-10 py-8 max-w-7xl m-auto h-full bg-gray-200 rounded-2xl my-6 flex items-start gap-8">
            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Image not available"
                class="rounded-lg max-w-xl h-96 object-cover">
            <div class="w-full">
                <div class="border-b border-gray-400 pb-2">
                    <span class="text-4xl font-semibold">{{ $book->name }}</span>
                    <p>by <span class="text-lg text-blue-600 px-1">{{ $book->author->name }}</span> {{ '(Author)' }}
                        ,<span class="text-lg text-blue-600 pl-2">{{ $book->category->name }}</span> {{ '(Category)' }} </p>
                    <p class="py-1">{{ $book->description }}</p>
                    <div class="flex items-end py-2">
                        <svg class="w-6 h-6 {{ $book->rank >= 1 ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-6 h-6 {{ $book->rank >= 2 ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-6 h-6 {{ $book->rank >= 3 ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-6 h-6 {{ $book->rank >= 4 ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-6 h-6 {{ $book->rank >= 5 ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="pl-4 text-lg font-medium">( {{ $book->rank }} Rating )</span>
                    </div>
                </div>
                <div class="py-4 text-center">
                    @if ($book->stock == 0)
                        <span class="text-4xl font-semibold text-red-500">Out Of Stock</span>
                    @else
                        <form class="block h-full text-left" action="/cart/{{ $book->slug }}/store" method="post">
                            @csrf
                            <div class="flex items-start justify-between">
                                <div>
                                    <span class="text-3xl font-semibold">Rs {{ $book->price }}.00</span>
                                    <span class="block text-sm text-gray-500">Inclusive of all taxes</span>
                                </div>
                                <div>
                                    <span class="{{ $book->stock <= 10 ? 'text-red-600' : 'text-gray-600' }} block">( Only
                                        {{ $book->stock }} Book Left )</span>
                                </div>
                            </div>
                            <div class="py-3.5 flex items-center gap-8">
                                <div class="flex items-center gap-4">
                                    <label for="quantity" class="block text-lg text-gray-500">Quantity</label>
                                    <select name="quantity" id="quantity"
                                        class="outline-none bg-transparent border-gray-400">
                                        @for ($i = 1; $i <= $book->stock; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="flex items-center gap-4">
                                    <label for="days" class="block text-lg text-gray-500">Days</label>
                                    <select name="days" id="days"
                                        class="outline-none bg-transparent border-gray-400">
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="py-4 flex items-center gap-6">
                                @if (in_array($book->id, $orders->toArray()))
                                    <a class="px-6 py-2 bg-blue-500 text-white rounded-lg flex items-center gap-2"
                                        href="/cart">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <polygon
                                                points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9">
                                            </polygon>
                                        </svg>
                                        <span>Go To Cart</span>
                                    </a>
                                @else
                                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg">Add to
                                        Cart</button>
                                @endif
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
