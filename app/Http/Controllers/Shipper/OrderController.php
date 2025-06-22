<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Danh sách đơn hàng được gán cho shipper
    public function index(Request $request)
    {
        $shipper = \App\Models\Shipper::where('user_id', Auth::id())->first();
        $orders = collect();
        $tab = $request->get('tab', 'assigned');
        $statusMap = [
            'need_confirm' => ['confirmed'],
            'assigned' => ['assigned'],
            'in_delivery' => ['in_delivery'],
            'delivered' => ['delivered'],
            'cancelled' => ['cancelled'],
            'cancel_requested' => ['cancel_requested'],
        ];
        if ($shipper && isset($statusMap[$tab])) {
            $orders = \App\Models\Order::where('shipper_id', $shipper->id)
                ->whereIn('status', $statusMap[$tab])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('shipper.orders.index', compact('orders'));
    }

    // Form cập nhật trạng thái đơn hàng
    public function edit($id)
    {
        $shipper = \App\Models\Shipper::where('user_id', Auth::id())->first();
        if (!$shipper) abort(404);
        $order = Order::where('shipper_id', $shipper->id)->findOrFail($id);
        return view('shipper.orders.edit', compact('order'));
    }

    // Xử lý cập nhật trạng thái đơn hàng
    public function update(Request $request, $id)
    {
        $shipper = \App\Models\Shipper::where('user_id', Auth::id())->first();
        if (!$shipper) abort(404);
        $order = Order::where('shipper_id', $shipper->id)->findOrFail($id);
        $validTransitions = [
            'confirmed' => ['assigned'],
            'assigned' => ['in_delivery'],
            'in_delivery' => ['delivered', 'cancel_requested'],
            'cancel_requested' => ['cancelled'],
        ];
        $request->validate([
            'status' => 'required|in:confirmed,assigned,in_delivery,delivered,cancel_requested,cancelled',
        ]);
        $current = $order->status;
        $next = $request->status;
        if (!isset($validTransitions[$current]) || !in_array($next, $validTransitions[$current])) {
            return back()->withErrors(['status' => 'Chuyển trạng thái không hợp lệ!']);
        }
        $order->status = $next;
        $order->save();
        return redirect()->route('shipper.orders.progress')
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    // Trang tiến trình giao hàng của shipper
    public function progress(Request $request)
    {
        $shipper = \App\Models\Shipper::where('user_id', Auth::id())->first();
        $orders = collect();
        if ($shipper) {
            $orders = \App\Models\Order::where('shipper_id', $shipper->id)
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        return view('shipper.orders.progress', compact('orders'));
    }
}
