<div class="card h-100 position-relative shadow-sm border rounded overflow-hidden">
    @if ($product->discount_percent)
        <div class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 small rounded-start">
            -{{ $product->discount_percent }}%
        </div>
    @endif

    <img src="{{ $product->image_url }}" class="card-img-top img-fluid" alt="{{ $product->name }}" style="height: 280px; object-fit: cover;">

    <div class="card-body text-center">
        <h5 class="card-title fw-semibold">
            {{ $product->name }}
        </h5>

        <p class="card-text text-muted mb-1">
            {{ number_format($product->price, 0, ',', '.') }} đ
        </p>

        <div class="text-warning small mb-3">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $product->rating)
                    ★
                @else
                    ☆
                @endif
            @endfor
        </div>

        <div class="d-flex align-items-center justify-content-between">
            @auth
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="p-2 m-0 add-to-cart-form">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0" style="border: none; background: none;">
                        <i class="bi bi-cart fs-4 text-success"></i>
                    </button>
                </form>
                <div class="flex-grow-1">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-100">
                        @csrf
                        <input type="hidden" name="buy_now" value="1">
                        <button type="submit" class="btn btn-success w-100 py-2">Mua ngay</button>
                    </form>
                </div>
            @else
                <div class="flex-grow-1 w-100">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">Đăng nhập để mua hàng</a>
                </div>
            @endauth
        </div>
    </div>
</div>