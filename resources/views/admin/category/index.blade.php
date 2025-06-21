@extends('admin.layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/category.css') }}">
@endsection

@section('content')

    <div class="container">
        <h1>Danh sách danh mục</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary"><a href="{{ route('admin.categories.create') }}" style="color: white; text-decoration: none;">Thêm danh mục mới</a></button>

    </div>


    <hr>
    <div>
        {{$categories->appends(request()->all())->links()}}
    </div>

@endsection