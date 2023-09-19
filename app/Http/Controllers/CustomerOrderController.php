<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        return view('customer.orders.index', [
            'orders' => Payment::where('user_id', Auth::id())->orderBy('id','DESC')->get()
        ]);
    }

    public function display(Payment $payment)
    {
        return view('customer.orders.display',[
            'payment' => $payment,
            'orders' => $payment->orderAssigned
        ]);
    }
}
