<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index',[
            'books' => Book::filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
            'currentCategory' => null,
            'currentAuthor' => null
        ]);
    }
}
