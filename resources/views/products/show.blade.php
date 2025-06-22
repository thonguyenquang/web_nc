@extends('layouts.main')
@section('content')
<div class="container py-5" style="max-width: 800px;">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3"><i class="bi bi-arrow-left"></i> Quay lại</a>
    <div class="row g-4">
        <div class="col-md-5">
            <img src="{{ $product->image_url }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $product->name }}">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">{{ $product->name }}</h2>
            <div class="mb-2">
                <span class="text-warning">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="bi {{ $i <= $product->averageRating() ? 'bi-star-fill text-warning' : 'bi-star' }}"></i>
                    @endfor
                </span>
                <span class="ms-2">({{ number_format($product->averageRating(), 1) }} / 5)</span>
                <span class="text-muted ms-2">{{ $product->reviews->count() }} đánh giá</span>
            </div>
            <h4 class="text-danger mb-3">{{ number_format($product->price, 0, ',', '.') }} đ</h4>
            @if($product->discount_percent)
                <div class="mb-2">
                    <span class="badge bg-danger">-{{ $product->discount_percent }}%</span>
                </div>
            @endif
            <div class="mb-3">
                <strong>Mô tả:</strong>
                <div class="mt-1">{!! nl2br(e($product->description)) !!}</div>
            </div>
            <div class="mb-3">
                <strong>Danh mục:</strong> {{ $product->category->name ?? 'Chưa phân loại' }}
            </div>
            <div class="mb-3">
                <strong>Còn lại:</strong> {{ $product->stock ?? 'Không rõ' }} sản phẩm
            </div>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-success px-4">Thêm vào giỏ</button>
                    </form>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="m-0">
                        @csrf
                        <input type="hidden" name="buy_now" value="1">
                        <button type="submit" class="btn btn-primary px-4">Mua ngay</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary px-4">Đăng nhập để mua</a>
                @endauth
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="mb-3">Đánh giá sản phẩm</h4>
        @if($product->reviews->count())
            <div class="row row-cols-1 row-cols-md-2 g-3">
                @foreach($product->reviews as $review)
                    <div class="col">
                        <div class="border rounded p-3 bg-light h-100">
                            <div class="d-flex align-items-center mb-2">
                                <strong>{{ $review->user->name }}</strong>
                                <span class="ms-3 text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $review->rating ? 'bi-star-fill text-warning' : 'bi-star' }}"></i>
                                    @endfor
                                </span>
                                <span class="ms-2 text-muted small">{{ $review->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div>{{ $review->comment }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">Chưa có đánh giá nào cho sản phẩm này.</p>
        @endif
    </div>
</div>
@endsection
