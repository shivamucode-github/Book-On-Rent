@extends('customer.layout.main')
@push('title')
    <title>Book On Rent | Stripe Payment</title>
@endpush
@section('main')
    <div class="panel panel-default bg-white">
        <div class="panel-body  max-w-xl m-auto py-16">
            <h1
                class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">
                Make A Payment</h1>
            <form
                action="{{ route('stripe.store', ['payment' => encrypt($payment), 'cartCheckout' => $cartCheckout, 'returnBook' => $returnBook, 'buyNow' => $buyNow]) }}"
                method="POST" id="card-form">
                @csrf
                <div class="mb-3">
                    <label for="card-name"
                        class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Payment</label>
                    <input disabled value="Rs {{ decrypt($payment) }}" type="text" name="price" id="card-name"
                        class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
                </div>
                <div class="mb-3">
                    <label for="card-name" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Your
                        name</label>
                    <input type="text" name="name" id="card-name"
                        class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <label for="email" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Email</label>
                    <input type="email" name="email" id="email"
                        class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <label for="card" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Card
                        details</label>

                    <div class="bg-gray-100 p-6 rounded-xl">
                        <div id="card"></div>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-12">Pay 👉</button>
            </form>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px'
                }
            }
        })
        const cardForm = document.getElementById('card-form')
        const cardName = document.getElementById('card-name')
        cardElement.mount('#card')
        cardForm.addEventListener('submit', async (e) => {
            e.preventDefault()
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: cardName.value
                }
            })
            if (error) {
                console.log(error)
            } else {
                let input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'payment_method')
                input.setAttribute('value', paymentMethod.id)
                cardForm.appendChild(input)
                cardForm.submit()
            }
        })
    </script>
@endsection
