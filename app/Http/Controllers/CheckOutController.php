<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        // delete unwanted orders from database
        DeleteUnwantedOrders::delete();

        return view('customer.checkout.index', [
            'orders' => Order::where('user_id', Auth::id())->where('days', '!=', null)->withoutTrashed()->latest()->get(),
            'payments' => Order::where('user_id', Auth::id())->where('days', '!=', null)->filter('null')->pluck('price')
        ]);
    }
}
