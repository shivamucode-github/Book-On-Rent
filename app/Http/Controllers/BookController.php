<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::paginate(15),
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    public function store(BookRequest $request)
    {
        try{
            Book::create([
                'name' => $request->name,
                'thumbnail' => $request->thumbnail,
                'price' => $request->price,
                'author_id' => $request->author,
                'category_id' => $request->category
            ]);

            return back()->with('success','Book Added Succesfully..');
        }catch(Exception $e){
            return back()->with('error','Something went wrong');
        }
    }
}
