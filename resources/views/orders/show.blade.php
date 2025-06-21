
@extends('layouts.main')
@section('content')
<div class="container py-5" style="max-width: 700px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4" style="background: rgba(255,255,255,0.97); border-radius: 16px;">
            <div class="text-center mb-4">
                <i class="bi bi-receipt-cutoff" style="font-size: 2.5rem; color: #a05c5c;"></i>
                <h2 class="mt-2 mb-0" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Chi tiết đơn hàng</h2>
            </div>
            <div class="row mb-3 g-3">
                <div class="col-md-6">
                    <div class="border rounded p-3 h-100 bg-light">
                        <div class="mb-2"><span class="fw-bold">Mã đơn hàng:</span> #{{ $order->id }}</div>
                        <div class="mb-2"><span class="fw-bold">Trạng thái:</span> <span class="badge bg-info text-dark px-3 py-2" style="font-size:1rem;">{{ $order->status }}</span></div>
                        <div><span class="fw-bold">Ngày đặt:</span> {{ $order->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 h-100 bg-light">
                        <div class="mb-2"><span class="fw-bold">Khách hàng:</span> {{ $order->fullname }}</div>
                        <div class="mb-2"><span class="fw-bold">Điện thoại:</span> {{ $order->phone }}</div>
                        <div class="mb-2"><span class="fw-bold">Email:</span> {{ $order->email }}</div>
                        <div><span class="fw-bold">Địa chỉ:</span> {{ $order->address }}, {{ $order->ward }}, {{ $order->district }}, {{ $order->province }}</div>
                        @if($order->note)
                            <div class="mt-2"><span class="fw-bold">Ghi chú:</span> {{ $order->note }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <h5 class="mb-3 mt-4" style="color: #a05c5c;"><i class="bi bi-box-seam"></i> Sản phẩm</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-end">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    @if($item->product && $item->product->image)
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; margin-right: 8px;">
                                    @endif
                                    {{ $item->product->name ?? 'Sản phẩm đã xoá' }}
                                </td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Tổng cộng:</td>
                            <td class="text-end fw-bold text-danger" style="font-size:1.2rem;">{{ number_format($order->total_price) }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('orders.track', $order->id) }}" class="btn btn-outline-primary px-4"><i class="bi bi-truck"></i> Theo dõi đơn hàng</a>
                <a href="{{ route('home') }}" class="btn btn-link">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection
