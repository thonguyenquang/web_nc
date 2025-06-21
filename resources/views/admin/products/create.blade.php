@extends('admin.layouts.admin')
@section('title', 'Thêm sản phẩm mới')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/product.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Thêm sản phẩm mới</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="season">Mùa (season):</label>
                <input type="text" name="season" id="season" class="form-control">
            </div>

            <div class="form-group">
                <label for="page">Trang hiển thị (page):</label>
                <select name="page" id="page" class="form-control">
                    <option value="">-- Không hiển thị --</option>
                    <option value="home">Home</option>
                    <option value="shop">Shop</option>
                </select>
            </div>

            <div class="form-group">
                <label for="section">Khu vực hiển thị (section):</label>
                <select name="section" id="section" class="form-control">
                    <option value="">-- Không hiển thị --</option>
                    <option value="season_collection">Season Collection</option>
                    <option value="promotions">Promotions</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
@endsection
