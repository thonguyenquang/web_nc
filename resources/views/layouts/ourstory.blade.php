@extends('layouts.main')

@section('title', 'Shop')
@section('fullwidth')
<img src="{{ asset('images/bg-our.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection
@section('content')
<div class="services text-center py-10">
    <h1 >Our Story</h1>
    <p>Fiore Flowers has been telling stories with flowers since 1991, building a reputation around the world for creating beautiful and memorable floral creations perfectly matched to every occasion and setting.</p>
</div>
<div class="services">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/our1.webp')}}" class="img-fluid " alt="img1" style="max-height: 500px; object-fit: cover;">
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/our2.webp')}}" class="img-fluid " alt="img2" style="max-height: 500px; object-fit: cover; margin-top: 50px;">
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/our3.webp')}}" class="img-fluid " alt="img3" style="max-height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>
<div class="services text-center py-10">
    <h1 >Our Philosophy</h1>
    <p>At the heart of our studio practice is a love of the shape and form of flowers, combined with a creative edge. We’re passionate about celebrating nature in our installations and working with seasonal flowers and foliage helps us to keep within nature’s own cycle. We are, and always have been, committed to finding ethical, sustainable solutions to the challenges within our industry. From using recycled packaging and wrapping, to donating waste flowers and plants to Flower Angels (a charity the promotes wellbeing through flowers), we are continually looking at ways to reduce our carbon footprint and benefit the local community.</p>
</div>
<div class="services-content">
    <div class="services-block">
        <img src="{{ asset('images/our4.webp')}}" class="img-fluid w-100" alt="services">
    </div>
    <div class="services-block">
        <div class="services-text py-5">
            <h1>Hailey Nguyen</h1>
            <p>THE OWNER</p>
        </div>
        <div class="services-text text-center py-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
    </div>
</div>
<section class="intro-section" style="text-align: center; padding: 60px 20px;">
  <img src="{{ asset('images/our5.webp')}}"  alt="flower" class="intro-image" style="width: 60px; margin-bottom: 30px;">
  <p class="intro-text" style="font-size: 2rem; line-height: 1.6; max-width: 800px; margin: 0 auto 40px auto;">
    Fiore is a floral atelier, workshop and retail space led by <br>
    Fiola Johnson. Our studio specialises in producing truly <br>
    original, innovative floral designs for events, shoots, <br>
    workplaces and weddings.
  </p>
  <button class="intro-button" style="padding: 10px 25px; border-radius: 25px; border: 1px solid #ccc; background-color: white; font-size: 0.9rem; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s ease;">
    SHOP OUR FLOWER
  </button>
</section>

@endsection