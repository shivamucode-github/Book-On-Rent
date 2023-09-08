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
            'authors' => Author::paginate(15)
        ]);
    }

    public function store(CheckNameRequest $request)
    {
        try {
            Author::create($request);
            return back()->with('success', 'Author Added Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
