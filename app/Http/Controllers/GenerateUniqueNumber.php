<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class GenerateUniqueNumber extends Controller
{
    public static function uniqueOrderNumber()
    {
        // to check the duplicasy of order number
        $order_num = Order::all()->pluck('order_num')->toArray();
        do {
            $orderNum = Random::generate(6, '0-9');
        } while (in_array($orderNum, $order_num));

        return $orderNum;
    }
}
