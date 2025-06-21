@extends('layouts.main')

@section('content')
<div class="container py-5" style="max-width: 700px;">
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-4">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Thông tin tài khoản</h2>
            <div class="mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-4">
            <h4 class="mb-3" style="color: #a05c5c;">Đổi mật khẩu</h4>
            @include('profile.partials.update-password-form')
        </div>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-body p-4">
            <h4 class="mb-3 text-danger">Xoá tài khoản</h4>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
