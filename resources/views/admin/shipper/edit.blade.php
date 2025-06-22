@extends('admin.layouts.admin')
@section('title', 'Sửa shipper')
@section('content')
<div class="container py-4">
    <h2>Sửa shipper</h2>
    <form action="{{ route('admin.shippers.update', $shipper->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên shipper</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $shipper->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $shipper->phone) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $shipper->email) }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="active" @if($shipper->status=='active') selected @endif>Đang hoạt động</option>
                <option value="inactive" @if($shipper->status=='inactive') selected @endif>Ngừng hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
    </form>
    <form action="{{ route('admin.shippers.destroy', $shipper->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Bạn có chắc muốn xóa shipper này?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
</div>
@endsection
