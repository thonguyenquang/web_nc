@extends('shipper.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Cập nhật trạng thái đơn hàng #{{ $order->id }}</h2>
    <form action="{{ route('shipper.orders.update', $order->id) }}" method="POST" class="mt-3">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Trạng thái mới</label>
            <select name="status" class="form-control" required>
                @if($order->status == 'confirmed')
                    <option value="confirmed" selected>Đã xác nhận</option>
                    <option value="assigned">Nhận đơn (Xác nhận nhận đơn)</option>
                @elseif($order->status == 'assigned')
                    <option value="assigned" selected>Đã gán shipper</option>
                    <option value="in_delivery">Bắt đầu giao</option>
                    <option value="cancel_requested">Từ chối nhận đơn</option>
                @elseif($order->status == 'in_delivery')
                    <option value="in_delivery" selected>Đang giao</option>
                    <option value="delivered">Giao hàng thành công</option>
                    <option value="cancel_requested">Yêu cầu hủy đơn</option>
                @elseif($order->status == 'cancel_requested')
                    <option value="cancel_requested" selected>Yêu cầu hủy đơn</option>
                    <option value="cancelled">Xác nhận hủy</option>
                @elseif($order->status == 'delivered')
                    <option value="delivered" selected>Đã giao hàng</option>
                @elseif($order->status == 'cancelled')
                    <option value="cancelled" selected>Đã hủy</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu trạng thái</button>
        <a href="{{ route('shipper.orders.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
