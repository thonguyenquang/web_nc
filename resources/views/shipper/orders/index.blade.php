@extends('shipper.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Đơn hàng của bạn</h2>
    <ul class="nav nav-tabs mb-3" id="shipperTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab')=='need_confirm') active @endif" href="?tab=need_confirm">Cần xác nhận</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab','assigned')=='assigned') active @endif" href="?tab=assigned">Cần giao</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab')=='in_delivery') active @endif" href="?tab=in_delivery">Đang giao</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab')=='delivered') active @endif" href="?tab=delivered">Đã giao</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab')=='cancel_requested') active @endif" href="?tab=cancel_requested">Yêu cầu hủy</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(request('tab')=='cancelled') active @endif" href="?tab=cancelled">Đã hủy</a>
        </li>
    </ul>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->fullname }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ __($order->status) }}</td>
                    <td>
                        <a href="{{ route('shipper.orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Cập nhật</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Không có đơn hàng nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
@endsection
