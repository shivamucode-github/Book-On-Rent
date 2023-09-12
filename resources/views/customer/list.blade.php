@extends('customer.layout.main')
@section('main')
    <main>
        <section id="books"
            class="py-10 px-2 sm:px-10 lg:px-32 bg-white space-y-12 max-w-7xl m-auto mt-6 rounded-2xl relative">
            <div class="bg-white grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                @forelse ($books as $book)
                    <a href="#" class="rounded-[2rem] border border-black p-4 space-y-4">
                        <div class="rounded-[2rem] h-[15rem] border-2 border-black overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80"
                                alt="" class="object-cover object-center w-full h-full">
                        </div>
                        <div class="space-y-1 flex items-end justify-between">
                            <small class="text-lg font-bold">{{ $book->name }}</small>
                            <span class="block text-sm font-bold"><span class="text-xl">Rs
                                </span>{{ $book->price . '.00' }}</span>
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
                    </a>
                @empty
            </div>
            <div class="w-full text-center">
                <p class="text-5xl font-semibold">No Book Found</p>
            </div>
            @endforelse ()
            </div>
            <div class="w-full">
                {{ $books->links() }}
            </div>
        </section>
    </main>
@endsection
