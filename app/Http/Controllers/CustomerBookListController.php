<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomerBookListController extends Controller
{
    public function index()
    {
        return view('customer.list', [
            'books' => Book::filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
            'currentCategory' => null,
            'currentAuthor' => null
        ]);
    }
}
