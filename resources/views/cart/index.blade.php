@extends('layouts.main')

@section('content')
<div class="cart-container my-5">
    <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Giỏ hàng của bạn</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th style="width:120px;">Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $total += $item->product->price * $item->quantity; @endphp
                    <tr data-id="{{ $item->product_id }}">
                        <td class="d-flex align-items-center gap-2">
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            <span>{{ $item->product->name }}</span>
                        </td>
                        <td class="price">{{ number_format($item->product->price) }} VNĐ</td>
                        <td>
                            <input type="number" name="quantity" class="form-control quantity-input text-center" data-id="{{ $item->product_id }}" value="{{ $item->quantity }}" min="1">
                        </td>
                        <td class="subtotal">{{ number_format($item->product->price * $item->quantity) }} VNĐ</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" class="remove-form d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                    <td colspan="2" class="fw-bold text-danger">{{ number_format($total) }} VNĐ</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-center">
                        <form action="{{ route('checkout') }}" method="GET" class="d-inline">
                            <button type="submit" class="btn btn-success px-5 py-2">Thanh toán</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="d-flex flex-column align-items-center justify-content-center py-5">
            <i class="bi bi-cart-x" style="font-size: 5rem; color: #e75480;"></i>
            <div class="mt-3 text-muted fs-5">Giỏ hàng trống</div>
        </div>
    @endif
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.quantity-input').on('change', function(){
        let input = $(this);
        let quantity = parseInt(input.val());
        let productId = input.data('id');
        if(quantity < 1) {
            alert('Số lượng phải lớn hơn hoặc bằng 1');
            input.val(1);
            quantity = 1;
        }
        $.ajax({
            url: '/cart/update/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            },
            success: function(response) {
                location.reload();
            }
        });
    });
});
</script>

