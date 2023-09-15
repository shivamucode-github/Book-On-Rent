<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{
    public function index()
    {
        $payment = Order::all()->pluck('price')->sum();
        return view('customer.stripe.index',[
            'payment' => $payment
        ]);
    }

    public function store(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51NqUt4SDt1oMRJsJeb961xWsstvNsks3mUbzAonIb8NdGBvO6Vr4uLwmklalID9NeSPr1EBWxAG8NSqHWSooP2Py00xmlTT8DZ');
        // $var = $stripe->paymentIntents->create([
        //     'amount' => 8000,
        //     'currency' => 'inr',
        //     // 'confirm' => true,
        //     'automatic_payment_methods' => [
        //         'enabled' => true,
        //     ],
        //     // 'automatic_payment_methods' => [
        //     //     'allow_redirects' => 'never'
        //     // ],
        // ]);
        // dd($var);
        try {
            $payment = Order::all()->pluck('price')->sum();

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

            dd($value->status);
        } catch (Exception $th) {
            dd($th->getMessage());
            return back()->with('error', "There was a problem processing your payment");
        }

        return back()->with('success', 'Payment done.');
    }
}
