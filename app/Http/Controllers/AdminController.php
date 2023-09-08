<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'users' => User::all(),
            'books' => Book::all(),
            'orders' => Order::all(),
            'payments' => Order::all()->pluck('price')
        ]);
    }
}
