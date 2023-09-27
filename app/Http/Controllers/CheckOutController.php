<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->where('days', '!=', null)->filter('notNull')->get();
        if ($orders) {
            foreach ($orders as $order) {
                if (!$order->paidOrders) {
                    $order->forceDelete();
                }
            }
        }

        return view('customer.checkout.index', [
            'orders' => Order::where('user_id', Auth::id())->where('days', '!=', null)->withoutTrashed()->latest()->get(),
            'payments' => Order::where('user_id', Auth::id())->where('days', '!=', null)->filter('null')->pluck('price')
        ]);
    }
}
