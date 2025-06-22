@extends('admin.layouts.admin')
@section('title', 'Danh sách shipper')
@section('content')
<div class="container py-4">
    <h2>Danh sách shipper</h2>
    <a href="{{ route('admin.shippers.create') }}" class="btn btn-primary mb-3">Thêm shipper mới</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shippers as $shipper)
            <tr>
                <td>{{ $shipper->id }}</td>
                <td>{{ $shipper->name }}</td>
                <td>{{ $shipper->phone }}</td>
                <td>{{ $shipper->email }}</td>
                <td>{{ $shipper->status }}</td>
                <td>
                    <a href="{{ route('admin.shippers.edit', $shipper->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.shippers.destroy', $shipper->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa shipper này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $shippers->links() }}
</div>
@endsection
