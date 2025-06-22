@extends('layouts.main')

@section('title', 'Shop')

@section('fullwidth')
    <img src="{{ asset('images/bg-shop.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection

@section('content')
    <div class="content mb-4">
        <h1 class="text-center mb-2" style="font-family: 'Playfair Display', serif; font-size:2.5rem; letter-spacing:2px;">Bộ sưu tập hoa</h1>
        <div class="text-center mb-4 text-muted" style="font-size:1.1rem;">Khám phá những mẫu hoa tươi đẹp, sang trọng và ý nghĩa cho mọi dịp đặc biệt.</div>
    </div>

    <div class="container-fluid px-2 px-md-4">
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    @include('products.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection

@push('styles')
<style>
.product-card-custom {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 2px 16px 0 rgba(160,92,92,0.07);
    border: 1px solid #f3eaea;
    transition: box-shadow 0.2s, transform 0.2s;
    min-height: 420px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-bottom: 10px;
}
.product-card-custom:hover {
    box-shadow: 0 6px 32px 0 rgba(160,92,92,0.13);
    transform: translateY(-4px) scale(1.02);
    border-color: #e7cfcf;
}
.product-card-custom .card-img-top {
    border-radius: 18px 18px 0 0;
    max-height: 220px;
    object-fit: cover;
}
.product-card-custom .card-title {
    font-size: 1.15rem;
    min-height: 48px;
    margin-bottom: 0.5rem;
}
.product-card-custom .card-text {
    font-size: 1.08rem;
    margin-bottom: 0.3rem;
}
.product-card-custom .text-warning {
    font-size: 1.1rem;
    letter-spacing: 1px;
}
</style>
@endpush