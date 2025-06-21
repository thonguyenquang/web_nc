<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', ' mặc định')</title>
    
     @yield('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
   
    @if(session('error'))
    <div style="
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 400px;
    ">
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Cảnh báo</h4>
            <p>{{ session('error') }}</p>
            <hr>
            <a href="{{ route('login') }}" class="text-dark fw-bold text-decoration-none mb-0">
                Quay lại
            </a>
            
            
        </div>
    </div>
@endif


        @yield('content')
   

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        @yield('js')
        @yield('animation')
</body>
</html>