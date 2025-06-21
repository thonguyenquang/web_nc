@extends('admin.layouts.admin')

@section('content')
<section class="order-update-section">
    <h2 class="order-update-title">🔄 Cập nhật trạng thái đơn hàng <span class="order-id">#{{ $order->id }}</span></h2>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="order-update-form">
        @csrf @method('PUT')
        <label>
            <span>Trạng thái mới:</span>
            <select name="status" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn tất</option>
                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </label>
        <button type="submit" class="action-btn save">💾 Lưu</button>
    </form>
</section>

<style>
body {
    background: linear-gradient(135deg, #b7e6ff 0%, #f6d365 100%);
    min-height: 100vh;
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
}
.order-update-section {
    max-width: 480px;
    margin: 44px auto;
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
.order-update-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0e1e3d;
    text-shadow: 0 2px 10px #fff1;
    margin-bottom: 18px;
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
    font-size: 1.01rem;
    margin-left: 7px;
    box-shadow: 0 1px 7px #ffd00022;
}
.order-update-form {
    display: flex;
    flex-direction: column;
    gap: 21px;
}
.order-update-form label {
    font-size: 1.07rem;
    font-weight: 600;
    color: #1976d2;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.order-update-form select {
    padding: 0.65rem 1rem;
    border-radius: 12px;
    border: 1.7px solid #e0e7ff;
    background: rgba(255,255,255,0.95);
    font-size: 1.07rem;
    transition: box-shadow 0.2s, border 0.2s;
    outline: none;
    margin-top: 4px;
}
.order-update-form select:focus {
    border-color: #7dd3fc;
    box-shadow: 0 0 0 2px #38bdf8;
}
.action-btn.save {
    background: linear-gradient(90deg,#36d1c4 0%, #5b86e5 100%);
    color: #fff;
    padding: 12px 0;
    border-radius: 12px;
    font-size: 1.11rem;
    font-weight: 700;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 14px #5b86e550;
    transition: background 0.2s, transform 0.13s, color 0.13s;
    letter-spacing: 0.02rem;
}
.action-btn.save:hover {
    background: linear-gradient(90deg,#5b86e5 0%, #36d1c4 100%);
    color: #0e1e3d;
    transform: scale(1.06);
}
@media (max-width: 600px) {
    .order-update-section { padding: 14px 2vw 12px 2vw; border-radius: 10px;}
    .order-update-title { font-size: 1.1rem; }
    .action-btn.save { font-size: 1rem;}
}
</style>
@endsection