@extends('layouts.main')
@section('tilte','services')
@section('fullwidth')
<img src="{{ asset('images/secrices.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection
@section('content')
<div class="services text-center py-10" style="padding-top: 3rem; padding-bottom: 3rem;">
    <h1>Private Events</h1>
    <p>Who doesn’t love a good party? Nothing gets us more excited than hearing about how we can be a part of your event.</p>
</div>
<div class="services-content flex-wrap align-items-center mb-5" style="gap: 2rem; padding: 2rem 0;">
    <div class="services-block" style="flex:1; min-width:280px;">
        <img src="{{ asset('images/services.webp')}}" class="img-fluid w-100 rounded-4 shadow" alt="services" style="max-width: 420px; object-fit:cover;">
    </div>
    <div class="services-block" style="flex:2; min-width:320px;">
        <div class="services-text text-center py-4">
            <h1 class="fw-bold mb-3" style="font-family: 'Cormorant Garamond', serif;">From an intimate dinner to a large scale event</h1>
        </div>
        <div class="services-text text-center py-2 px-3">
            <p style="font-size:1.1rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            <p style="font-size:1.1rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
        </div>
        <div class="services-text text-center py-3">
            <a href="{{route('ourstory')}}"><button class="btn btn-success rounded-pill shadow px-4 py-2" style="margin:10px;">Our shop</button></a>
        </div>
    </div>
</div>

<div class="services text-center py-10 " style="padding-top: 2.5rem; padding-bottom: 2.5rem;">
    <h2 class="fw-bold mb-3" style="font-family: 'Cormorant Garamond', serif;">Our Process</h2>
    <p class="mb-2" style="font-size:1.1rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
    <p style="font-size:1.1rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
</div>
<div class="services" style="padding: 2.5rem 0;">
    <h1 class="text-center mb-5 fw-bold" style="font-family: 'Cormorant Garamond', serif;">Our shop</h1>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/ser.webp')}}" class="img-fluid rounded-4 shadow" alt="img1" style="max-height: 340px; min-width:220px; object-fit: cover;">
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/ser1.webp')}}" class="img-fluid rounded-4 shadow" alt="img2" style="max-height: 340px; min-width:220px; object-fit: cover; margin-top: 30px;">
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/ser2.webp')}}" class="img-fluid rounded-4 shadow" alt="img3" style="max-height: 340px; min-width:220px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>
@endsection