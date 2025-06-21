@extends('admin.layouts.admin')
@section('title', 'Đăng xuất')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/logout.css') }}">
@endsection

@section('content')
    <div class="logout">
        <div class="logout__container">
            <h1>Bạn có chắc chắn muốn đăng xuất?</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Huỷ</a>
            </form>
        </div>
    </div>
@endsection
