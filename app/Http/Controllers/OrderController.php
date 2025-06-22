<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền xem đơn hàng này.');
        }

        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    public function track()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.track', compact('orders'));
    }
}
