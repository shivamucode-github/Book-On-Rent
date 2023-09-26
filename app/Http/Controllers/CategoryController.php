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
            'categories' => Category::filter(request(['search']))->paginate(15)->withQueryString()
        ]);
    }

    public function store(CheckNameRequest $request)
    {
        try {
            Category::create($request->toArray());
            return back()->with('success', 'Category Added Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, CheckNameRequest $request)
    {
        try {
            $category->update($request->toArray());
            return back()->with('success', 'Category Updated Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(Category $category)
    {
        try {
            $category->delete();
            return back()->with('success', 'Category Deleted ..');
        } catch (Exception $e) {
            return back()->with('error', "Category belongs to various books, can't deleted");
        }
    }
}
