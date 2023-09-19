<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnBookRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ReturnBookController extends Controller
{
    public function create()
    {
        return view('customer.returnBook.index');
    }

    public function view(ReturnBookRequest $request)
    {
        $order = Order::where('id', $request->rentId)->where('user_id', Auth::id())->onlyTrashed()->first();

        if($order){
            return view('customer.returnBook.index', [
                'order' => $order
            ]);
        }else{
            return back()->with('error','Invalid Rental ID');
        }
    }
}
