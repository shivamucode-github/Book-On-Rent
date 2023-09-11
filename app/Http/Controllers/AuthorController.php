<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckNameRequest;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.author.index', [
            'authors' => Author::filter(request(['search']))->paginate(15)->withQueryString()
        ]);
    }

    public function store(CheckNameRequest $request)
    {
        try {
            Author::create($request->toArray());
            return back()->with('success', 'Author Added Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit(Author $author)
    {
        return view('admin.author.edit', [
            'author' => $author
        ]);
    }

    public function update(CheckNameRequest $request,Author $author)
    {
        try {
            $author->update($request->toArray());
            return back()->with('success', 'Data Updated Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(Author $author)
    {
        try {
            $author->delete();
            return back()->with('success','Author Deleted ..');
        } catch (Exception $e) {
            return back()->with('error', "Author belongs to various books, can't deleted");
        }
    }
}
