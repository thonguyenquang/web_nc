@extends('layouts.main')

@section('content')
<div class="container py-5" style="max-width: 700px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4" style="background: rgba(255,255,255,0.95); border-radius: 16px;">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Thanh toán đơn hàng</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('checkout.placeOrder') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12 col-md-6">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" value="{{ old('fullname', Auth::user()->name ?? '') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email ?? '') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Điện thoại</label>
                    <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Tỉnh/Thành phố</label>
                    <input type="text" name="province" class="form-control" value="{{ old('province') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Quận/Huyện</label>
                    <input type="text" name="district" class="form-control" value="{{ old('district') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Phường/Xã</label>
                    <input type="text" name="ward" class="form-control" value="{{ old('ward') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Địa chỉ cụ thể</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Ghi chú cho đơn hàng (tuỳ chọn)</label>
                    <textarea name="note" class="form-control" rows="2" placeholder="Ví dụ: Giao giờ hành chính, gọi trước khi giao, ...">{{ old('note') }}</textarea>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="mb-3" style="color: #a05c5c;">Đơn hàng của bạn</h5>
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
                                @php $total = 0; @endphp
                                @foreach($cart as $item)
                                    @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px;">
                                                <span>{{ $item->product->name }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-end">{{ number_format($subtotal) }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-end fw-bold">Tổng cộng:</td>
                                    <td class="text-end fw-bold text-danger">{{ number_format($total) }} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
                
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-success px-5 py-2 shadow">Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>