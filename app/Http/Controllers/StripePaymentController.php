<?php

namespace App\Http\Controllers;

use App\Http\Requests\StripePaymentRequest;
use App\Models\Order;
use App\Models\PaidOrders;
use App\Models\Payment;
use App\Models\Payments;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{
    public function index()
    {
        $payment = Order::where('user_id', Auth::id())->withoutTrashed()->pluck('price')->sum();
        return view('customer.stripe.index', [
            'payment' => $payment
        ]);
    }

    public function store(StripePaymentRequest $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51NqUt4SDt1oMRJsJeb961xWsstvNsks3mUbzAonIb8NdGBvO6Vr4uLwmklalID9NeSPr1EBWxAG8NSqHWSooP2Py00xmlTT8DZ');

        try {
            $payment = Order::where('user_id', Auth::id())->withoutTrashed()->pluck('price')->sum();

            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $value = $stripe->paymentIntents->create([
                'confirm' => true,
                'amount' => $payment * 100,
                'currency' => 'inr',
                'payment_method' => $request->payment_method,
                'description' => 'Demo payment with stripe',
                'receipt_email' => $request->email,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ],
                'off_session' => true,
            ]);

            // To store transaction data in our database
            $this->savePaidOrders($value);
        } catch (Exception $th) {
            return back()->with('error', "There was a problem processing your payment");
        }
        return back()->with('success', 'Payment done.');
    }

    // function to store data in database
    public function savePaidOrders($value)
    {
        try {
            $status = Payment::create([
                'transaction_id' => $value->id,
                'user_id' => Auth::id(),
                'status' => $value->status,
                'amount' => $value->amount / 100,
            ]);

            if ($status) {

                $ids = Order::where('user_id', Auth::id())->withoutTrashed()->pluck('id');
                $status->orderAssigned()->attach($ids);
                Order::destroy($ids);
            }
        } catch (Exception $e) {
            return back()->with('error', "There was a problem processing your payment");
        }
    }
}
