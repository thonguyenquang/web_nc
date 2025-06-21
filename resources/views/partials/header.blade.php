<header style="padding: 1rem 2rem;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-left">
            <a class="nav-link" href="">
               <h1 style="font-family: 'Playfair Display', serif; margin: 0;">Fióre</h1>
            </a>
        </div>
        <div class="header-right">
            <div class="header-item"><a class="nav-link" href="{{route('home')}}">Home</a></div>
            <div class="header-item"><a class="nav-link" href="{{route('ourstory')}}">Our Story</a></div>
            <div class="header-item"><a class="nav-link" href="{{route('shop')}}">Shop</a></div>
            
            <div class="header-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown">
                    Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                    <li><a class="dropdown-item" href="{{route('services')}}">Corporate Events</a></li>
                </ul>
            </div>

            <div class="header-item position-relative">
                <a class="nav-link" href="{{ route('cart.index') }}">
                    <i class="bi bi-cart3 cart-icon" style="font-size: 1.4rem;"></i>
                    <span id="cart-count" class="cart-badge">
                        @auth
                            {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
                        @else
                            0
                        @endauth
                    </span>
                </a>
            </div>

            @auth
                <div class="header-item position-relative dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person" style="font-size: 1.4rem; margin-right: 10px;"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Tài khoản</a></li>
                        <li><a class="dropdown-item" href="{{ url('/orders/' . Auth::id() . '/track') }}">Theo dõi đơn hàng</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="header-item position-relative">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="bi bi-person" style="font-size: 1.4rem; margin-right: 10px;"></i>
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>