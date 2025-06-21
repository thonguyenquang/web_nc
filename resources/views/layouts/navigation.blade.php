<nav class="navbar navbar-expand-lg navbar-light" style="background: rgb(249, 247, 228); box-shadow: 0 4px 8px rgba(0,0,0,0.07);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="font-family: 'Playfair Display', serif;">Fióre</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ourstory') }}">Our Story</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="{{ route('services') }}">Corporate Events</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item position-relative">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart3" style="font-size: 1.3rem;"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill" style="font-size: 0.8rem;">@auth{{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}@else 0 @endauth</span>
                    </a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person me-2"></i>{{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Tài khoản</a></li>
                        <li><a class="dropdown-item" href="{{ url('/orders/' . Auth::id() . '/track') }}">Theo dõi đơn hàng</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="bi bi-person me-2"></i>Login
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
