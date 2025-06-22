<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fióre</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('head')

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"> --}}
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
<style>
   body, .container, .row, .col-12, .col-md-4, .text-center, .services, .services-content, .services-block, .services-text, h1, h2, p, button {
        font-family: 'Cormorant Garamond', serif !important;
    }
    .chat-fixed {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #0084FF;
      color: white;
      padding: 12px 18px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      z-index: 9999;
    }
  </style>
</head>
<body>
    @include('partials.header')
    @yield('fullwidth')
   <div class="container">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
    <a href="https://m.me/614223091784069" target="_blank" class="chat-fixed">
        💬 Message
      </a>
</body>
</html>