<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    public function track(Order $order)
    {
        return view('orders.track', compact('order'));
    }
}
