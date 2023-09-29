<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        return view('admin.returnBook.index', [
            'orders' => Order::onlyTrashed()->orderBy('id', 'DESC')->paginate(15)
        ]);
    }
}
