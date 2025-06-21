@extends('layouts.main')

@section('content')
<div class="container py-5" style="max-width: 700px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4" style="background: rgba(255,255,255,0.95); border-radius: 16px;">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Theo dõi đơn hàng</h2>
            <div class="mb-3">
                <span class="fw-bold">Mã đơn hàng:</span> #{{ $order->id }}<br>
                <span class="fw-bold">Trạng thái:</span> <span class="badge bg-info">{{ $order->status }}</span><br>
                <span class="fw-bold">Ngày đặt:</span> {{ $order->created_at->format('d/m/Y H:i') }}
            </div>
            <div class="mb-3">
                <span class="fw-bold">Khách hàng:</span> {{ $order->fullname }}<br>
                <span class="fw-bold">Điện thoại:</span> {{ $order->phone }}<br>
                <span class="fw-bold">Địa chỉ giao hàng:</span> {{ $order->address }}, {{ $order->ward }}, {{ $order->district }}, {{ $order->province }}
            </div>
            <h5 class="mb-3" style="color: #a05c5c;">Tiến trình đơn hàng</h5>
            <ul class="list-group mb-4">
                <li class="list-group-item {{ $order->status == 'pending' ? 'active' : '' }}">Chờ xác nhận</li>
                <li class="list-group-item {{ $order->status == 'confirmed' ? 'active' : '' }}">Đã xác nhận</li>
                <li class="list-group-item {{ $order->status == 'shipping' ? 'active' : '' }}">Đang giao hàng</li>
                <li class="list-group-item {{ $order->status == 'completed' ? 'active' : '' }}">Đã giao thành công</li>
                <li class="list-group-item {{ $order->status == 'cancelled' ? 'active' : '' }}">Đã huỷ</li>
            </ul>
            <div class="text-center">
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-secondary">Xem chi tiết đơn hàng</a>
                <a href="{{ route('home') }}" class="btn btn-link">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection
