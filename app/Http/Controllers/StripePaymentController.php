<?php

namespace App\Http\Controllers;

use App\Http\Requests\StripePaymentRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{
    public function index(Request $request)
    {
        // check the order quantity is not more than stock of book
        try {
            if ($request->id && $request->buyNow) {
                $id = decrypt($request->id);
                $book = Book::where('slug', $id)->first();
                $buyNow = Order::create([
                    'user_id' => Auth::id(),
                    'book_id' => $book->id,
                    'price' => $book->price,
                    'days' => null,
                    'quantity' => 1,
                    'order_num' =>  GenerateUniqueNumber::uniqueOrderNumber()
                ]);
                $payment = encrypt($book->price);
            } elseif ($request->balance) {
                $payment = $request->balance;
            } else {
                $payment = $request->cartCheckout;
            }

            if (decrypt($payment) == 0) {
                return back()->with('error', 'Invalid Order ! Please try again');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Something went wrong. plaese try after some time.');
        }
        return view('customer.stripe.index', [
            'payment' => $payment,
            'returnBook' => $request->returnBook ?? null, // for checking the request is come from return book page
            'cartCheckout' => $request->cartCheckout ?? null,  // for checking the request is come from Add to cart page
            'buyNow' => $buyNow ?? null //for checking the request is come from buy now
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'email' => 'required|email|min:5|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
        ]);

        if ($validator->fails()) {
            return redirect('/checkout')->withErrors($validator);
        }

        // check the payment is valid or not
        try {
            $payment = decrypt($request->payment);
        } catch (Exception $e) {
            return redirect('/return')->with('error', 'Invalid Payment , Plase try agian !');
        }

        // initialize the desription according to the request come for return book or car checkout
        try {
            if ($request->cartCheckout ?? null) {
                $descreption = "Demo Rental Payment";
            }
            if ($request->returnBook ?? null) {
                $descreption = "Demo Charges for Late Returning of Book";
            }
            if ($request->buyNow ?? null) {
                $descreption = "Demo Payment of Buying Book";
            }
        } catch (Exception $e) {
            return back()->with('error', 'Payment is not done. plaese try after some time.');
        }

        // // create stripe payment
        // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        try {
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $value = $stripe->paymentIntents->create([
                'confirm' => true,
                'amount' => decrypt($payment) * 100,
                'currency' => 'inr',
                'payment_method' => $request->payment_method,
                'description' => $descreption,
                'receipt_email' => $request->email,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ],
                'off_session' => true,
            ]);

            // To store transaction data in our database
            $this->savePaidOrders($value, $request);
        } catch (Exception $e) {
            return redirect('/cart')->with('error', "There was a problem in processing your payment");
        }
        return redirect('/home')->with('orderSuccess', 'Payment done.');
    }

    // function to store data in database
    public function savePaidOrders($value, $request)
    {
        try {
            // store transaction data in database
            $status = Payment::create([
                'transaction_id' => $value->id,
                'user_id' => Auth::id(),
                'status' => $value->status,
                'description' => $value->description,
                'amount' => $value->amount / 100,
            ]);

            if ($status) {
                if ($request->cartCheckout) {
                    $ids = Order::where('user_id', Auth::id())->where('days', '!=', null)->withoutTrashed()->pluck('id');
                    foreach ($ids as $id) {
                        $order = Order::find($id);
                        $order->bookStockUpdate(); //updating the stock of book
                    }
                    $status->orderAssigned()->attach($ids);
                    Order::destroy($ids); // soft delete the order from orders table
                }
                if ($request->returnBook) {
                    $order = Order::where('id', decrypt($request->returnBook))->onlyTrashed()->first();
                    $status->orderAssigned()->attach($order);
                    $order->update(['return_at' => now()]);  //update the order return_at column for check the book is returned
                    $order->book->update(['stock' => $order->book->stock + $order->quantity]); //updating the stock of book

                }
                if ($request->buyNow) {
                    $order = Order::where('id', $request->buyNow)->first();
                    $order->bookStockUpdate(); //updating the stock of book
                    $status->orderAssigned()->attach($order);
                    $order->delete();
                }
            }
        } catch (Exception $e) {
            return back()->with('error', "There was a problem processing your payment");
        }
    }
}
