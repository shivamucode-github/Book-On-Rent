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
        return view('customer.cart', [
            'orders' => Order::where('user_id', Auth::id())->get(),
            'payments' => Order::all()->pluck('price')
        ]);
    }

    public function create(Book $book)
    {
        return view('customer.show', [
            'book' => $book
        ]);
    }

    public function store(Book $book, OrderRequest $request)
    {
        try {
            if ($request->quantity <= $book->stock) {
                $price = $book->price / 10 * $request->days * $request->quantity;
                Order::create([
                    'user_id' => Auth::id(),
                    'book_id' => $book->id,
                    'price' => $price,
                    'days' => $request->days,
                    'quantity' => $request->quantity
                ]);

                return back()->with('success', 'Order created successfully');
            }
            return back()->with('error', 'Quantity is more than stock');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
