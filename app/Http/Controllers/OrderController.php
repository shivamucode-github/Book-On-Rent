<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index',[
            'orders' => Order::paginate(15),
            'users' => User::where('id','!=',Auth::id()),
            'books' => Book::all()
        ]);
    }
}
