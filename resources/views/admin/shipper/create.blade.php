@extends('admin.layouts.admin')
@section('title', 'Thêm shipper mới')
@section('content')
<div class="container py-4">
    <h2>Thêm shipper mới</h2>
    <form action="{{ route('admin.shippers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên shipper</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="active">Đang hoạt động</option>
                <option value="inactive">Ngừng hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
