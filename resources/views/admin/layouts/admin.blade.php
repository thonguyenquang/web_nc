<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang mặc định')</title>
    
     @yield('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/layoutsAdmin.css') }}">
</head>
<body>
    

        <div class="contain">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="logo-apple"></ion-icon>
                            </span>
                            <span class="title">brand name</span>
                        </a>
    
                    </li>
                    <li>
    
                        <a href="dashboard">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">dashboard</span>
                        </a>
    
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}">
                            <span class="icon"><ion-icon name="browsers-outline"></ion-icon></span>
                            <span class="title">Products</span>
                        </a>
    
    
                    </li>
                    <li>
                        
                        <a href="{{ route('admin.categories.index') }}">
                            <span class="icon"><ion-icon name="albums-outline"></ion-icon></span>
                            <span class="title">Category</span>
                        </a>
    
    
                    </li>
                    <li>
                   
                        <a href="{{route('admin.orders.index')}}">
                           <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                            <span class="title">Order</span>
                        </a>
    
    
                    </li>
                    <li>
                        <a href="{{route('admin.shippers.index')}}">
                            <span class="icon"><ion-icon name="rocket-outline"></ion-icon></span>
                            <span class="title">Shipper</span>
                        </a>
    
    
                    </li>
               
    
                    <li>
                      
                        <a href="{{route('confirm.logout')}}">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign out</span>
                        </a>

                    </li>


                </ul>
            </div>
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
    
                    <div class="search">
                        <form action="{{ route('admin.products.index') }}" method="GET">
                            <label>
                                <input type="text" name="keyword" placeholder="Search here" value="{{ request('keyword') }}">
                                <button type="submit" style="border: none; background: transparent;">
                                    <ion-icon name="search-outline"></ion-icon>
                                </button>
                            </label>
                        </form>
                    </div>
                    
    
                    <div class="user">
                        <img src="{{asset('images/our4.webp')}}" alt="">
                    </div>
                </div>
    
                    @yield('content')             
            </div>
            
        </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('admin/js/layoutsAdmin.js') }}"></script>

    @yield('chartsJs')
    @yield('js')
    
</body>
</html>
