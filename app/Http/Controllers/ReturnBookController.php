<?php

namespace App\Http\Controllers;

//use App\Http\Requests\ReturnBookRequest;

use App\Http\Requests\ReturnBookRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        if ($order) {
            return view('customer.returnBook.index', [
                'order' => $order
            ]);
        } else {
            return back()->with('error', 'Invalid Rental ID');
        }
    }

    public function edit(Request $request)
    {
        $order = Order::where('id', $request->id)->onlyTrashed()->first();
        $toDate = Carbon::parse(now());
        $fromDate = Carbon::parse($order->created_at);

        $days = $toDate->diffInDays($fromDate);

        if ($days <= $order->days) {
            $order->update(['return_at' => now()]);
            return back()->with('success', 'Book Returned Thankyou Visit Again..');
        } else {
            return view('customer.returnBook.index', [
                'order' => $order,
                'balance' => ($days - $order->days) * 10,
                'days' => $days - $order->days
            ]);
        }
    }
}
