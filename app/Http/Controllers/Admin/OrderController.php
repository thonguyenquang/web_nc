<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();

        // Tìm kiếm theo status hoặc tên khách hàng
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('fullname')) {
            $query->where('fullname', 'like', '%' . $request->fullname . '%');
        }

        $orders = $query->orderBy('created_at', 'asc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     // 2. Hiển thị chi tiết 1 đơn hàng
     public function show($id)
     {
         $order = Order::with('user')->findOrFail($id);
         return view('admin.orders.show', compact('order'));
     }

    /**
     * Show the form for editing the specified resource.
     */
     // 3. Form sửa đơn hàng
     public function edit($id)
     {
         $order = Order::findOrFail($id);
         return view('admin.orders.edit', compact('order'));
     }

    /**
     * Update the specified resource in storage.
     */


    // 4. Xử lý cập nhật trạng thái đơn hàng
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,completed,canceled'
        ]);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // 5. Xóa đơn hàng (nên hạn chế)
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Xóa đơn hàng thành công!');
    }
}
