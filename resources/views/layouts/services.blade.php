@extends('layouts.main')
@section('tilte','services')
@section('fullwidth')
<img src="{{ asset('images/secrices.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection
@section('content')
<div class="services text-center py-10">
    <h1 >Private Events</h1>
    <p>Who doesn’t love a good party? Nothing gets us more excited than hearing about how we can be a part of your event.</p>
</div>
<div class="services-content">
    <div class="services-block">
        <img src="{{ asset('images/services.webp')}}" class="img-fluid w-100" alt="services">
    </div>
    <div class="services-block">
        <div class="services-text text-center py-5">
            <h1>From an intimate dinner to a large scale event</h1>
        </div>
        <div class="services-text text-center py-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
        </div>
        <div class="services-text text-center py-5">
            <a href="{{route('ourstory')}}"><button class=" rounded shadow" style="margin:10px;">Our shop</button></a>
        </div>
    </div>
</div>

<div class="services text-center py-10 ">
    <h2>Our Process</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
</div>
<div class="services">
    <h1 class="text-center mb-5">Our shop</h1>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/ser.webp')}}" class="img-fluid " alt="img1" style="max-height: 500px; object-fit: cover;">
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/ser1.webp')}}" class="img-fluid " alt="img2" style="max-height: 500px; object-fit: cover; margin-top: 50px;">
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/ser2.webp')}}" class="img-fluid " alt="img3" style="max-height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>

@endsection