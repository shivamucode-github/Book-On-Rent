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
    public function show(Book $book)
    {
        return view('admin.books.show',[
            'book' => $book
        ]);
    }

    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::filter(request(['search']))->orderBy('id', 'desc')->paginate(15)->withQueryString(),
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    public function store(BookRequest $request)
    {
        try {
            Book::create([
                'name' => $request->name,
                'thumbnail' => Book::storeImage($request->image),
                'price' => $request->price,
                'author_id' => $request->author,
                'category_id' => $request->category,
                'description' => $request->description,
                'rank' => $request->rank,
                'stock' => $request->stock,
            ]);

            return back()->with('success', 'Book Added Succesfully..');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'book' => $book,
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    public function update(Book $book, BookRequest $request)
    {
        try {
            $book->update([
                'name' => $request->name,
                'thumbnail' => $request->image ? Book::storeImage($request->image) : $book->thumbnail,
                'price' => $request->price,
                'author_id' => $request->author,
                'category_id' => $request->category,
                'description' => $request->description,
                'rank' => $request->rank,
                'stock' => $request->stock,
            ]);

            return back()->with('success', 'Book Updated Succesfully..');
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(Book $book)
    {
        try {
            $book->delete();
            return back()->with('success', 'Book Deleted ..');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong ');
        }
    }
}
