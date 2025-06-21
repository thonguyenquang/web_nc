@extends('layouts.main')

@section('title', 'Shop')

@section('fullwidth')
    <img src="{{ asset('images/bg-shop.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection

@section('content')
    <div class="content">
        <h1 class="text-center mb-4">Our Flowers</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    @include('products.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination mt-4">
        {{ $products->links() }}
    </div>
@endsection