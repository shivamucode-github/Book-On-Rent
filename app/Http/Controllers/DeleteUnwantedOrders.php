<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteUnwantedOrders extends Controller
{
    public static function deleteBuyNowOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('days', '!=', null)->filter('notNull')->get();
        if ($orders) {
            $orders->forceDelete();
        }
    }

    public static function deleteRentOrders()
    {
        $orders = Order::where('days', null)->where('deleted_at', null)->where('return_at', null)->get();
        if ($orders) {
            foreach ($orders as $order) {
                if (!$order->paidOrders) {
                    $order->forceDelete();
                }
            }
        }
    }
}
