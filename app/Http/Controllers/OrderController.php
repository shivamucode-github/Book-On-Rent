<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Payments;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Payment::paginate(15),
            'users' => User::where('id', '!=', Auth::id())->get(),
            'books' => Book::all()
        ]);
    }

    public function display(Payment $payment)
    {
        return view('admin.orders.display',[
            'payment' => $payment,
            'orders' => $payment->orderAssigned
        ]);
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order,
            'users' => User::all(),
            'books' => Book::all()
        ]);
    }

    public function store(OrderRequest $request)
    {
        try {
            $price = Book::find($request->book)->price / 10 * $request->days * $request->quantity;
            Order::create([
                'user_id' => $request->user,
                'book_id' => $request->book,
                'price' => $price,
                'days' => $request->days,
                'quantity' => $request->quantity
            ]);

            return back()->with('success', 'Order created successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(Order $order, OrderRequest $request)
    {
        try {
            $price = Book::find($request->book)->price / 10 * $request->days * $request->quantity;
            $order->update([
                'user_id' => $request->user,
                'book_id' => $request->book,
                'price' => $price,
                'days' => $request->days,
                'quantity' => $request->quantity
            ]);

            return back()->with('success', 'Order created successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(Payment $order)
    {
        try {
            $order->delete();
            return back()->with('success', 'Order Deleted ..');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong ');
        }
    }
}
