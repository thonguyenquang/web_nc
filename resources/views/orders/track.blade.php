@extends('layouts.main')

@section('content')
<div class="container py-5" style="max-width: 900px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4" style="background: rgba(255,255,255,0.95); border-radius: 16px;">
            <h2 class="mb-4 text-center">Theo dõi đơn hàng</h2>

            @if ($orders->isEmpty())
                <p class="text-center">Bạn chưa có đơn hàng nào.</p>
            @else
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td><span class="badge bg-info">{{ $order->status }}</span></td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Xem</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-link">← Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection
