@extends('layouts.main')

@section('title', 'Shop')
@section('fullwidth')
<img src="{{ asset('images/bg-our.jpg') }}" class="img-fluid w-100" alt="Shop background">
@endsection
@section('content')
<div class="services text-center py-5" style="background: #fffbe9; border-radius: 32px; box-shadow: 0 8px 32px rgba(60,60,60,0.08); margin-bottom: 48px;">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 700; letter-spacing: 1px; margin-bottom: 18px;">Our Story</h1>
    <p style="max-width: 700px; margin: 0 auto 18px auto; font-size: 1.15rem; color: #444; line-height: 1.7;">Fiore Flowers has been telling stories with flowers since 1991, building a reputation around the world for creating beautiful and memorable floral creations perfectly matched to every occasion and setting.</p>
</div>
<div class="services-img-row" style="gap: 2.5rem; margin-bottom: 40px;">
    <img src="{{ asset('images/our1.webp')}}" class="img-fluid" alt="img1" style="max-height: 420px; object-fit: cover; border-radius: 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.10);">
    <img src="{{ asset('images/our2.webp')}}" class="img-fluid" alt="img2" style="max-height: 420px; object-fit: cover; border-radius: 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.10); margin-top: 40px;">
    <img src="{{ asset('images/our3.webp')}}" class="img-fluid" alt="img3" style="max-height: 420px; object-fit: cover; border-radius: 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.10);">
</div>
<div class="services text-center py-10">
    <h1 >Our Philosophy</h1>
    <p>At the heart of our studio practice is a love of the shape and form of flowers, combined with a creative edge. We’re passionate about celebrating nature in our installations and working with seasonal flowers and foliage helps us to keep within nature’s own cycle. We are, and always have been, committed to finding ethical, sustainable solutions to the challenges within our industry. From using recycled packaging and wrapping, to donating waste flowers and plants to Flower Angels (a charity the promotes wellbeing through flowers), we are continually looking at ways to reduce our carbon footprint and benefit the local community.</p>
</div>
<div class="services-content owner-section py-5 px-4">
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