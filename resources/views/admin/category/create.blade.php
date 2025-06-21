@extends('admin.layouts.admin')
@section('title', 'Thêm danh mục mới')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/category.css') }}">
@endsection
@section('content')

    <div class="container">
        <h1>Thêm danh mục mới</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
         `       <label for="description">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </form>
    </div>
@endsection