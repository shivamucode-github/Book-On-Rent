<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckNameRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(CheckNameRequest $request)
    {
        try{
            Category::create($request);
            return back()->with('success','Category Added Succesfully');
        }catch(Exception $e){
            return back()->with('error','Something went wrong');
        }
    }
}
