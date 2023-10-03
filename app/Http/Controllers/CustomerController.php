<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        // delete unwanted orders from database
        DeleteUnwantedOrders::deleteRentOrders();

        return view('customer.index', [
            'books' => Book::filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
            'orders' => Order::where('user_id', Auth::id())->where('deleted_at', null)->where('days', '!=', null)->pluck('book_id'),
            'currentCategory' => null,
            'currentAuthor' => null
        ]);
    }
}
