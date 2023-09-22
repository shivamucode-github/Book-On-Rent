<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class CartController extends Controller
{
    public function index()
    {
        return view('customer.cart.index', [
            'orders' => Order::where('user_id', Auth::id())->where('days', '!=', null)->withoutTrashed()->latest()->get(),
            'payments' => Order::where('user_id', Auth::id())->where('days', '!=', null)->pluck('price')
        ]);
    }

    public function create(Book $book)
    {
        return view('customer.cart.show', [
            'book' => $book,
            'orders' => Order::where('user_id', Auth::id())->pluck('book_id'),
        ]);
    }

    public function store(Book $book, OrderRequest $request)
    {
        try {
            if ($request->quantity <= $book->stock) {
                $request->days ? $request->days : $request->request->add(['days' => 1]);
                $request->quantity ? $request->quantity : $request->request->add(['quantity' => 1]);
                $price = (2 / 100 * $book->price) * $request->days * $request->quantity;

                Order::create([
                    'user_id' => Auth::id(),
                    'book_id' => $book->id,
                    'price' => $price,
                    'days' => $request->days ? $request->days : 1,
                    'quantity' => $request->quantity ? $request->quantity : 1,
                    'order_num' => GenerateUniqueNumber::uniqueOrderNumber()
                ]);
                return back()->with('success', 'Book Added to Cart');
            }
            return back()->with('error', 'Quantity is more than stock');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(Order $order, Request $request)
    {
        try {
            if ($request->quantity <= $order->book->stock) {
                $request->days ? $request->days : $request->request->add(['days' => $order->days]);
                $request->quantity ? $request->quantity : $request->request->add(['quantity' => $order->quantity]);

                $price = (2 / 100 * $order->book->price) * $request->days * $request->quantity;

                $order->update([
                    'price' => $price,
                    'days' => $request->days != null ? $request->days : $order->days,
                    'quantity' => $request->quantity    != null ? $request->quantity : $order->quantity
                ]);
                return response()->json(['status' => 'Done', 'statusCode' => 200]);
            }
            return back()->with('error', 'Quantity is more than stock');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(Order $order)
    {
        try {
            $order->delete();
            return back()->with('success', 'Order deleted Succesfuly');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }
}
