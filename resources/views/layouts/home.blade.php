@extends('layouts.main')

@section('title', 'Shop')
@section('style')
<link rel="stylesheet" href="{{ asset('client/css/home.css') }}">
@endsection
@section('fullwidth')
<div class="hero-banner">
    <div class="hero-content text-center text-white">
        <h1 class="hero-title">We tell stories with flowers</h1>
        <a href="{{ route('shop') }}" class="hero-button">SHOP NOW</a>
    </div>
</div>
@endsection
@section('content')
<div class="container py-5">
    <h2 class="display-5 text-center fw-bold mt-3 mb-5">Seasons Finest</h2>
    <section class="section">
        <div class="section-content">
            
            @foreach ($season_collection as $item )
            
              <div class="section-item">
                <img src='{{ asset("storage/" . $item->image) }}' alt="">
                <div>{{$item ->name}}</div>
                <div>{{$item->price}}</div>
              </div>
            @endforeach
          
        </div>
    </section>

    <!-- Shop By Special Occasions section -->
    <div class="my-5 py-5">
        <div class="text-center mb-4">
            <img src="{{ asset('images/lg.jpg') }}" alt="divider" style="height:40px;">
            <h2 class="display-5 fw-bold mt-3 mb-5">Shop By Special Occasions</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <img src="{{ asset('images/hoa1.webp') }}" class="img-fluid mb-3" style="height:220px;object-fit:contain;" alt="Christmas">
                <div class="fs-4">Christmas</div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <img src="{{ asset('images/hoa2.webp') }}" class="img-fluid mb-3" style="height:220px;object-fit:contain;" alt="Birthday">
                <div class="fs-4">Birthday</div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <img src="{{ asset('images/hoa3.webp') }}" class="img-fluid mb-3" style="height:220px;object-fit:contain;" alt="Autumn">
                <div class="fs-4">Autumn</div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <img src="{{ asset('images/hoa4.webp') }}" class="img-fluid mb-3" style="height:220px;object-fit:contain;" alt="Anniversary">
                <div class="fs-4">Anniversary</div>
            </div>
        </div>
    </div>
</div>
<!-- Our Shop section -->
<div class="my-5 py-5">
    <div class="text-center mb-4">
        <img src="{{ asset('images/lg.jpg') }}" alt="divider" style="height:40px;">
        <h2 class="display-5 fw-bold mt-3 mb-5">Our Shop</h2>
    </div>

    <!-- Flex container for 4 equal items with gap -->
    <div class="d-flex justify-content-between flex-wrap" style="gap: 15px;">
        <!-- Item 1 -->
        <div class="flex-fill" style="min-width: calc(25% - 11.25px); max-width: calc(25% - 11.25px);">
            <div class="position-relative overflow-hidden text-white text-center rounded" style="height:400px;">
                <img src="{{ asset('images/hoa1.webp') }}" alt="Weddings" class="w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute bottom-0 w-100 py-3" style="background: rgba(0,0,0,0.5); font-size: 1.25rem;">
                    Weddings
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="flex-fill" style="min-width: calc(25% - 11.25px); max-width: calc(25% - 11.25px);">
            <div class="position-relative overflow-hidden text-white text-center rounded" style="height:400px;">
                <img src="{{ asset('images/hoa2.webp') }}" alt="Private Events" class="w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute bottom-0 w-100 py-3" style="background: rgba(0,0,0,0.5); font-size: 1.25rem;">
                    Private Events
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="flex-fill" style="min-width: calc(25% - 11.25px); max-width: calc(25% - 11.25px);">
            <div class="position-relative overflow-hidden text-white text-center rounded" style="height:400px;">
                <img src="{{ asset('images/hoa3.webp') }}" alt="Garden Designs" class="w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute bottom-0 w-100 py-3" style="background: rgba(0,0,0,0.5); font-size: 1.25rem;">
                    Garden Designs
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="flex-fill" style="min-width: calc(25% - 11.25px); max-width: calc(25% - 11.25px);">
            <div class="position-relative overflow-hidden text-white text-center rounded" style="height:400px;">
                <img src="{{ asset('images/hoa4.webp') }}" alt="Corporate Events" class="w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute bottom-0 w-100 py-3" style="background: rgba(0,0,0,0.5); font-size: 1.25rem;">
                    Corporate Events
                </div>
            </div>
        </div>
    </div>
</div>

<div class="floral-banner my-5 text-center">
    <div class="container d-flex justify-content-center align-items-center gap-4 flex-wrap">
        <!-- Left flower -->
        <img src="{{ asset('images/flower-left.webp') }}" alt="Left Flower" class="flower-img">

        <!-- Text -->
        <div class="floral-text px-3">
            <p class="mb-0">A premier and family-owned luxury<br>floral boutique</p>
        </div>

        <!-- Right flower -->
        <img src="{{ asset('images/flower-right.webp') }}" alt="Right Flower" class="flower-img">
    </div>
</div>
<div class="container my-5">
    <div class="row text-center justify-content-center">
        <!-- Box 1 -->
        <div class="col-12 col-md-4 mb-4">
            <div class="info-box p-4 h-100">
                <img src="{{ asset('images/icon1.webp') }}" alt="Delivery" class="mb-3" width="60" height="60">
                <div class="info-text">Free delivery for orders over $50.00</div>
            </div>
        </div>
        <!-- Box 2 -->
        <div class="col-12 col-md-4 mb-4">
            <div class="info-box p-4 h-100">
                <img src="{{ asset('images/icon2.webp') }}" alt="Freshness" class="mb-3" width="60" height="60">
                <div class="info-text">Freshness Guarantee</div>
            </div>
        </div>
        <!-- Box 3 -->
        <div class="col-12 col-md-4 mb-4">
            <div class="info-box p-4 h-100">
                <img src="{{ asset('images/icon3.webp') }}" alt="Hand tied" class="mb-3" width="60" height="60">
                <div class="info-text">All bouquets are hand tied</div>
            </div>
        </div>
    </div>
</div>
<!-- Gifts Section -->
<div class="container my-5 text-center">
    <img src="{{ asset('images/lg.jpg') }}" alt="divider" style="height:40px;">
    <h2 class="display-5 fw-bold mt-3">Gifts</h2>
    <p class="mt-3" style="font-size: 1.1rem; color:#2d2d2d;">
        Furnish your beautiful bouquet with a gift from our handpicked edit.
    </p>
    <section class="section">
        <div class="section-content">
            
            @foreach ($promotions as $item )
            
              <div class="section-item">
                <img src='{{ asset("storage/" . $item->image) }}' alt="">
                <div>{{$item ->name}}</div>
                <div>{{$item ->price}}</div>           
              </div>
            @endforeach
          
        </div>
    </section>


    <div class="row mt-5 justify-content-center">
    </div>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const category = this.dataset.category;
            document.querySelectorAll('.product-item').forEach(item => {
                if (item.classList.contains(category)) {
                    item.classList.remove('d-none');
                } else {
                    item.classList.add('d-none');
                }
            });
        });
    });
});
</script>
@endpush