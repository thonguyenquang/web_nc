@extends('admin.layouts.admin')

@section('content')
<section class="order-detail-section">
    <h2 class="order-detail-title">📝 Chi tiết đơn hàng <span class="order-id">#{{ $order->id }}</span></h2>
    <div class="order-detail-body">
        <ul class="order-info-list">
            <li><strong>Khách hàng:</strong> <span>{{ $order->fullname }}</span></li>
            <li><strong>Số điện thoại:</strong> <span>{{ $order->phone }}</span></li>
            <li><strong>Địa chỉ:</strong> <span>{{ $order->address }}</span></li>
            <li><strong>Tổng tiền:</strong> <span class="price">{{ number_format($order->total_price) }} đ</span></li>
            <li>
                <strong>Trạng thái:</strong>
                <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
            </li>
            <li><strong>Ngày tạo:</strong> <span>{{ $order->created_at }}</span></li>
        </ul>
        <a href="{{ route('admin.orders.edit', $order->id) }}" class="action-btn edit">Cập nhật trạng thái</a>
    </div>
</section>

<style>
body {
    background: linear-gradient(135deg, #b7e6ff 0%, #f6d365 100%);
    min-height: 100vh;
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
}
.order-detail-section {
    max-width: 540px;
    margin: 40px auto;
    padding: 32px 20px 24px 20px;
    background: rgba(255,255,255,0.75);
    border-radius: 22px;
    box-shadow: 0 8px 40px 0 rgba(0,0,0,0.10), 0 1.5px 4px 0 rgba(0,0,0,0.07);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.32);
    animation: fadeIn 0.7s;
}
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(45px);}
    100% { opacity: 1; transform: translateY(0);}
}
.order-detail-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #0e1e3d;
    text-shadow: 0 2px 10px #fff1;
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    gap: 7px;
}
.order-id {
    background: linear-gradient(90deg,#f7971e 0%, #ffd200 100%);
    color: #7d4300;
    padding: 3px 12px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.05rem;
    margin-left: 7px;
    box-shadow: 0 1px 7px #ffd00022;
}
.order-detail-body {
    padding: 12px 2px 0 2px;
    display: flex;
    flex-direction: column;
    gap: 18px;
}
.order-info-list {
    list-style: none;
    padding: 0;
    margin: 0 0 12px 0;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.order-info-list li {
    font-size: 1.07rem;
    display: flex;
    align-items: center;
    gap: 7px;
    color: #2d4059;
}
.order-info-list strong {
    width: 120px;
    font-weight: 700;
    color: #1976d2;
}
.price {
    font-weight: 700;
    color: #0f5132;
}
.status-badge {
    display: inline-block;
    min-width: 90px;
    text-align: center;
    font-size: 1rem;
    font-weight: 600;
    padding: 6px 16px;
    border-radius: 20px;
    transition: background 0.2s, color 0.2s;
    box-shadow: 0 1px 8px 0 #0001;
    border: 1.5px solid #fff2;
    letter-spacing: 0.3px;
}
.status-pending    { background: #fff4e6; color: #ff9800; border-color: #ffe0b2;}
.status-confirmed  { background: #e2f8ff; color: #0ea5e9; border-color: #b6e3ff;}
.status-shipped    { background: #e7ffe6; color: #22c55e; border-color: #bbf7d0;}
.status-completed  { background: #e8f0fe; color: #2563eb; border-color: #a7c7ff;}
.status-canceled   { background: #ffe3e3; color: #dc2626; border-color: #fecaca;}
.action-btn {
    padding: 10px 28px;
    border-radius: 12px;
    font-size: 1.04rem;
    font-weight: 700;
    border: none;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 2px 10px #ffe0b2b0;
    background: linear-gradient(90deg,#f7971e 0%, #ffd200 100%);
    color: #7d4300;
    transition: background 0.16s, color 0.16s, box-shadow 0.18s, transform 0.16s;
    display: inline-block;
    text-align: center;
}
.action-btn.edit:hover {
    background: linear-gradient(90deg, #ffd200 0%, #f7971e 100%);
    color: #fff;
    transform: translateY(-2px) scale(1.06);
}
@media (max-width: 600px) {
    .order-detail-section { padding: 10px 2vw 14px 2vw; border-radius: 11px;}
    .order-detail-title { font-size: 1.15rem; }
    .order-info-list strong { width: 80px; }
    .action-btn { width: 100%; padding: 10px 0; font-size: 1rem;}
}
</style>
@endsection