<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnBookRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnBookController extends Controller
{
    public function create()
    {
        return view('customer.returnbook');
    }

    public function view(ReturnBookRequest $request)
    {
        $order = Order::where('id', $request->rentId)->where('user_id', Auth::id())->first();
        return view('customer.returnbook', [
            'order' => $order
        ]);
    }
}
