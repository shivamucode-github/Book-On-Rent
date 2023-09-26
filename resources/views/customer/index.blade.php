@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | Home</title>
@endpush
@section('main')
    <main>
        <div class="relative {{ $errors->all() ? 'block' : 'hidden' }}" x-data="{ open: true }" x-init="setTimeout(() => open = false, 3000)">
            <div x-show="open"
                class="absolute z-40 top-2 right-4 w-1/2 bg-red-200 border border-red-500 rounded-lg px-8 py-4">
                <x-input-error :messages="$errors->all()" class="mt-2" />
                <button x-on:click="open = ! open">
                    <svg class="z-50 w-8 absolute top-3 right-3 h-8 hover:text-green-500 font-bold"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <x-order-success />
        <section
            class="pt-56 sm:pt-28 md:pt-8 px-0 lg:px-32 bg-white lg:h-screen rounded-br-[5rem] lg:rounded-br-[15rem] rounded-bl-[5rem] lg:rounded-bl-[15rem] relative overflow-hidden">
            <header class="h-1/2">
                <hgroup class="flex flex-col justify-center items-center text-center h-full gap-2">
                    <h4 class="font-bold py-2 px-8 text-xs border-2 border-black rounded-full">WELCOME TO ONLINE BOOK STORE
                    </h4>
                    <h1 class="font-bold text-5xl sm:text-[5rem]">Take Books On<span class="block text-5xl">Rent &
                            Learn</span>
                    </h1>
                </hgroup>
            </header>
            <section class="flex flex-col sm:flex-row items-center h-1/2 lg:-mt-24 z-10 p-8">
                <div
                    class="absolute bottom-0 left-1/4 top-[50%] w-[52%] h-full rounded-full bg-yellow-300 z-0 hidden lg:block">
                </div>
                <div class="w-1/2 z-10 space-y-4">
                    <div class="space-y-2">
                        <svg class="w-14 h-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z">
                                </path>
                            </g>
                        </svg>
                        <p class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui blanditiis obcaecati
                            ad et repellat iure doloribus labore atque nihil voluptatem.
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="block text-3xl font-bold">10K+</span>
                        <span class="block">Books</span>
                    </div>
                </div>
                <div class="w-full h-full z-10">
                    <img src="{{ asset('/storage/logo/books.png') }}" alt="" class="absolute bottom-0">
                </div>
                <div class="w-1/2 z-10 flex flex-col items-start sm:items-end gap-4">
                    <div class="flex gap-1 text-yellow-400">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="sm:text-right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui blanditiis
                        obcaecati ad et
                        repellat
                        iure doloribus labore atque nihil voluptatem.
                    </p>
                    <div class="flex gap-4 flex-row-reverse sm:flex-row items-center">
                        <div class="flex flex-col items-end">
                            <span class="font-bold">Pristia Candra</span>
                            <span class="text-xs text-gray-500">Author</span>
                        </div>
                        <div class="w-14 h-14">
                            <img src="https://tse1.mm.bing.net/th?id=OIP.l8Gq2tMTiFsD_rbHJcoY6QHaLO&pid=Api&P=0"
                                alt="" class="w-full h-full object-cover object-top rounded-full">
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section id="books"
            class="mt-6 py-10 px-2 sm:px-10 lg:px-32 bg-white space-y-12 rounded-[5rem] lg:rounded-[7%] relative">
            <header class="space-y-4">
                <a href="#books" class="px-8 py-2 text-xs font-bold border-2 border-black rounded-full inline-block">LET'S
                    START</a>
                <div class="flex flex-col xs:flex-row justify-between sm:items-center gap-8 sm:gap-0">
                    <h2 class="text-4xl font-bold">Explore Inspiring Online Books</h2>
                </div>
            </header>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                @foreach ($books as $book)
                    <div href="" class="rounded-[2rem] border border-black p-4 space-y-4 group">
                        <div>
                            <a href="/item/{{ $book->slug }}/show"
                                class="block rounded-[2rem] h-80 border-2 border-black overflow-hidden">
                                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="image not available"
                                    class="object-contain w-full h-full group-hover:object-cover">
                            </a>
                            <div class="space-y-1 flex items-end justify-between">
                                <small class="text-lg font-bold">{{ $book->name }}</small>
                                <span class="block text-sm font-bold"><span class="text-xl">Rs
                                    </span>{{ $book->price }}</span>
                            </div>
                            <div class="flex flex-col justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="font-semibold">Author </span>
                                    <span class="font-medium">{{ $book->author->name }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="font-semibold">Category </span>
                                    <span class="font-medium">{{ $book->category->name }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="font-semibold">Rating </span>
                                    <div class="flex">
                                        <svg class="w-4 h-4 {{ $book->rank >= 1 ? 'text-yellow-400' : 'text-gray-300' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg class="w-4 h-4 {{ $book->rank >= 2 ? 'text-yellow-400' : 'text-gray-300' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg class="w-4 h-4 {{ $book->rank >= 3 ? 'text-yellow-400' : 'text-gray-300' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg class="w-4 h-4 {{ $book->rank >= 4 ? 'text-yellow-400' : 'text-gray-300' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg class="w-4 h-4 {{ $book->rank >= 5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center gap-2">
                            @if ($book->stock != 0)
                                {{-- @dd($orders->toArray) --}}
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
                                    <form action="/cart/{{ $book->slug }}/store" method="post">
                                        @csrf
                                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg">Add to
                                            Cart</button>
                                    </form>
                                @endif
                                <form
                                    action="{{ route('stripe.index', ['buyNow' => encrypt(true), 'id' => encrypt($book->slug)]) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit"
                                        class="px-6 py-2 bg-red-500 text-white rounded-lg">{{ __('Buy Now') }}</button>
                                </form>
                            @else
                                <div class="w-full text-center -rotate-3">
                                    <span class="text-3xl text-red-500 font-bold">OUT OF STOCK</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full">
                {{ $books->links() }}
            </div>
        </section>
    </main>
@endsection
