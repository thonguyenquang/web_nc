@extends('layouts.main')
@section('content')
@foreach ($orders as $order)
    <h4>Đơn hàng #{{ $order->id }}</h4>
    @foreach ($order->items as $item)
        <div>
            <p>{{ $item->product->name }}</p>
            <p>Giá: {{ $item->price }} | SL: {{ $item->quantity }}</p>

            @php
                $review = $item->product->reviews->where('user_id', auth()->id())->first();
            @endphp

            <div>
                @if ($review)
                    <strong>Đã đánh giá:</strong> {{ $review->rating }} sao
                    <p>{{ $review->comment }}</p>
                    <button class="btn-edit-review" data-product-id="{{ $item->product->id }}" data-rating="{{ $review->rating }}" data-comment="{{ $review->comment }}">Sửa đánh giá</button>
                @else
                    <button class="btn-review" data-product-id="{{ $item->product->id }}">Đánh giá</button>
                @endif
            </div>
        </div>
    @endforeach
@endforeach


@endsection