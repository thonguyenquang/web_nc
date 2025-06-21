<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/secrices.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            background: rgba(255, 255, 245, 0.92);
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
        }
        .btn-dark {
            background: #b48a78;
            border: none;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-dark:hover {
            background: #a05c5c;
            color: #fff;
        }
        h2 {
            color: #a05c5c;
            font-family: 'Playfair Display', serif;
            font-weight: bold;
        }
        label, .form-check-label, .small, .text-danger {
            color: #7c5c4a !important;
        }
        .form-control:focus {
            border-color: #b48a78;
            box-shadow: 0 0 0 0.2rem rgba(180, 138, 120, 0.10);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Đăng ký</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="username">
                            @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a class="small" href="{{ route('login') }}">Đã có tài khoản?</a>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mb-2">Quay lại trang chủ</a>
                        <button type="submit" class="btn btn-dark w-100">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
