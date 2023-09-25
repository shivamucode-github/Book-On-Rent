<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerBookListController extends Controller
{
    public function index()
    {
        return view('customer.list', [
            'books' => Book::filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
            'orders' => Order::where('user_id', Auth::id())->where('deleted_at', null)->where('days', '!=', null)->pluck('book_id'),
            'currentCategory' => null,
            'currentAuthor' => null
        ]);
    }
}
