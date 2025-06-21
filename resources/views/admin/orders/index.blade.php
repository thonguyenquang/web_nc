@extends('admin.layouts.admin')

@section('content')
<section class="order-list-section">
    <h1 class="order-list-title">📦 Danh sách đơn hàng</h1>
    <form method="get" class="order-filter-form">
        <input type="text" name="customer_name" placeholder="Tên khách" value="{{ request('customer_name') }}">
        <select name="status">
            <option value="">-- Trạng thái --</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Đang giao</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoàn tất</option>
            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
        </select>
        <button type="submit">Lọc</button>
    </form>

    <div class="order-table-wrapper">
        <table class="order-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td><span class="order-id">{{ $order->id }}</span></td>
                    <td>{{ $order->fullname }}</td>
                    <td>{{ $order->phone }}</td>
                    <td><span class="price">{{ number_format($order->total_price) }} đ</span></td>
                    <td>
                        <span class="status-badge status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="action-btn view">Xem</a>
                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="action-btn edit">Sửa</a>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Xóa đơn hàng này?')" type="submit" class="action-btn delete">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $orders->links() }}
        </div>
    </div>
</section>

<style>
/* Nền glassmorphism */
body {
    background: linear-gradient(135deg, #b7e6ff 0%, #f6d365 100%);
    min-height: 100vh;
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
}
.order-list-section {
    max-width: 1200px;
    margin: 40px auto;
    padding: 28px 16px;
    background: rgba(255,255,255,0.65);
    border-radius: 24px;
    box-shadow: 0 8px 40px 0 rgba(0,0,0,0.10), 0 1.5px 4px 0 rgba(0,0,0,0.07);
    backdrop-filter: blur(7px);
    border: 1px solid rgba(255,255,255,0.32);
    animation: fadeIn 0.8s;
}
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(48px);}
    100% { opacity: 1; transform: translateY(0);}
}
.order-list-title {
    font-size: 2.3rem;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 22px;
    color: #0e1e3d;
    text-shadow: 0 2px 10px #fff1;
    display: flex;
    align-items: center;
    gap: 8px;
}
.order-filter-form {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-bottom: 18px;
    align-items: center;
}
.order-filter-form input, .order-filter-form select {
    padding: 0.65rem 1rem;
    border-radius: 12px;
    border: 1px solid #e0e7ff;
    background: rgba(255,255,255,0.9);
    font-size: 1rem;
    transition: box-shadow 0.2s, border 0.2s;
    outline: none;
    min-width: 160px;
}
.order-filter-form input:focus, .order-filter-form select:focus {
    border-color: #7dd3fc;
    box-shadow: 0 0 0 2px #38bdf8;
}
.order-filter-form button {
    background: linear-gradient(90deg,#ff5858 0%, #f09819 100%);
    color: #fff;
    border: none;
    padding: 0.7rem 1.5rem;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 3px 16px #ffbb0040;
    transition: background 0.18s, transform 0.15s;
}
.order-filter-form button:hover {
    background: linear-gradient(90deg,#f09819 0%, #ff5858 100%);
    transform: scale(1.04);
}

/* Table Glassmorphism */
.order-table-wrapper {
    overflow-x: auto;
    border-radius: 16px;
    box-shadow: 0 2px 16px 0 #0001;
    margin-top: 16px;
    background: rgba(255,255,255,0.87);
}
.order-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    min-width: 800px;
    border-radius: 16px;
    overflow: hidden;
    background: transparent;
}
.order-table th, .order-table td {
    padding: 16px 14px;
    text-align: left;
    font-size: 1.04rem;
}
.order-table th {
    background: linear-gradient(90deg,#36d1c4 0%, #5b86e5 100%);
    color: #fff;
    font-weight: 700;
    letter-spacing: 0.5px;
    border-right: 1.5px solid #fff4;
    border-bottom: 3px solid #f3eeff;
}
.order-table th:last-child,
.order-table td:last-child { border-right: none; }
.order-table tr {
    transition: background 0.23s, box-shadow 0.23s;
}
.order-table tbody tr {
    background: rgba(245,249,255,0.75);
}
.order-table tbody tr:nth-child(even) {
    background: rgba(204, 227, 253, 0.45);
}
.order-table tbody tr:hover {
    background: #fff6;
    box-shadow: 0 2px 26px #54c5ff1a;
}

.order-id {
    background: linear-gradient(90deg,#f7971e 0%, #ffd200 100%);
    color: #7d4300;
    padding: 3px 10px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.02rem;
    letter-spacing: 0.2px;
    box-shadow: 0 1px 7px #ffd00022;
}
.price {
    font-weight: 700;
    color: #0f5132;
}

.status-badge {
    display: inline-block;
    min-width: 90px;
    text-align: center;
    font-size: 0.98rem;
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
    padding: 6px 14px;
    border-radius: 8px;
    margin-right: 4px;
    font-size: 0.98rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: background 0.16s, color 0.16s, box-shadow 0.18s;
    outline: none;
    text-decoration: none;
    box-shadow: 0 0.5px 4px #00000009;
}
.action-btn.view {
    color: #2563eb;
    background: #e0e7ff;
}
.action-btn.edit {
    color: #f59e42;
    background: #fff6e6;
}
.action-btn.delete {
    color: #ef4444;
    background: #ffe4e6;
}
.action-btn:hover {
    filter: brightness(1.13) contrast(1.04);
    box-shadow: 0 2px 12px #ccc4;
    transform: translateY(-2px) scale(1.05);
}

/* Responsive */
@media (max-width: 900px) {
    .order-list-section {
        padding: 16px 3vw;
    }
    .order-table {
        min-width: 640px;
        font-size: 0.98rem;
    }
    .order-table th, .order-table td {
        padding: 10px 7px;
    }
    .order-list-title { font-size: 1.6rem; }
}
@media (max-width: 600px) {
    .order-list-section {
        padding: 8px 1vw;
    }
    .order-filter-form {
        gap: 7px;
        flex-direction: column;
        align-items: stretch;
    }
    .order-table-wrapper {
        border-radius: 4px;
    }
    .order-table th, .order-table td {
        padding: 8px 4px;
        font-size: 0.94rem;
    }
    .order-table {
        min-width: 520px;
    }
}

/* Pagination custom style (nếu bạn dùng Laravel pagination) */
.pagination {
    margin: 22px 0 2px 0;
    display: flex;
    justify-content: flex-end;
}
.pagination > * {
    font-size: 1.07rem;
    border-radius: 8px;
    padding: 7px 15px;
    margin: 0 3px;
    background: #f1f5ff;
    color: #1976d2;
    text-decoration: none !important;
    box-shadow: 0 1px 4px #a7c7ff22;
    transition: background 0.18s, color 0.18s;
}
.pagination > .active, .pagination > *:hover {
    background: #1976d2;
    color: #fff !important;
}
</style>
@endsection