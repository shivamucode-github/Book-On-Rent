<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('customer.cart.index', [
            'orders' => Order::where('user_id', Auth::id())->where('days', '!=', null)->withoutTrashed()->latest()->get(),
            'payments' => Order::where('user_id', Auth::id())->where('days', '!=', null)->filter('null')->pluck('price')
        ]);
    }

    public function create(Book $book)
    {
        return view('customer.cart.show', [
            'book' => $book,
            'orders' => Order::where('user_id', Auth::id())->where('deleted_at', null)->where('days', '!=', null)->pluck('book_id'),
        ]);
    }

    public function store(Book $book, OrderRequest $request)
    {
        try {
            if ($request->quantity <= $book->stock) {
                // check the order is already exists or not and update the quantity and price
                if ($this->updateExistsOrder($book)) {
                    return back()->with('success', 'Book Added to Cart');
                }
                // adding the days and quantity default value and calulating the price
                $request->days ? $request->days : $request->request->add(['days' => 1]);
                $request->quantity ? $request->quantity : $request->request->add(['quantity' => 1]);
                $price = (2 / 100 * $book->price) * $request->days * $request->quantity;
                // creating an order
                Order::create([
                    'user_id'    => Auth::id(),
                    'book_id'    => $book->id,
                    'price'      => $price,
                    'days'       => $request->days,
                    'quantity'   => $request->quantity,
                    'order_num'  => GenerateUniqueNumber::uniqueOrderNumber()
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
                // updating the order
                $order->update([
                    'price' => $price,
                    'days' => $request->days,
                    'quantity' => $request->quantity
                ]);
                return response()->json(['status' => 'Done', 'statusCode' => 200]);
            }
            return back()->with('error', 'Quantity is more than stock');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong Please try after some time');
        }
    }

    public function destory(Order $order)
    {
        try {
            $order->forceDelete();
            return back()->with('success', 'Order deleted Succesfuly');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }

    // check the exists of order or not and update the properties
    public function updateExistsOrder(Book $book)
    {
        $order = Order::where('book_id', $book->id)->where('user_id', Auth::id())->where('days', '!=', null)->first();
        if ($order) {
            $order->update([
                'quantity' => $order->quantity + 1,
                'price' => (2 / 100 * $order->book->price) * $order->days * ($order->quantity + 1)
            ]);
            return true;
        }
        return false;
    }
}
