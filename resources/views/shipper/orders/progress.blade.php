@extends('shipper.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tiến trình giao hàng của tôi</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID Đơn</th>
                <th>Khách hàng</th>
                <th>Điện thoại</th>
                <th>Trạng thái</th>
                <th>Cập nhật gần nhất</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->fullname }}</td>
                <td>{{ $order->phone }}</td>
                <td><span class="badge bg-info">{{ ucfirst($order->status) }}</span></td>
                <td>{{ $order->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('shipper.orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Cập nhật</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">Không có đơn hàng nào.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
