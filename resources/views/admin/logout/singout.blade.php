@extends('admin.layouts.admin')
@section('title', 'Đăng xuất')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/logout.css') }}">
@endsection

@section('content')
<div class="logout d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="logout__container text-center">
        <h1 class="mb-4">Bạn có chắc chắn muốn đăng xuất?</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger mr-2">Đăng xuất</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Huỷ</a>
        </form>
    </div>
</div>

@endsection

@section('js')
<script>
    // Hiển thị cảnh báo khi người dùng vừa vào trang này
    alert("⚠️ Bạn sắp đăng xuất khỏi hệ thống.");
</script>
@endsection
