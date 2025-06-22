@extends('admin.layouts.admin')
@section('title', 'Thêm sản phẩm mới')

@section('styles')
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-product {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 32px rgba(0,0,0,0.07);
            padding: 40px 30px 30px 30px;
            margin-top: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        h1 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
        }
        .form-group label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #555;
        }
        .form-control,
        .form-control-file {
            border-radius: 8px;
            min-height: 42px;
            font-size: 16px;
            box-shadow: none !important;
            border: 1px solid #ced4da;
            transition: border 0.2s;
        }
        .form-control:focus,
        .form-control-file:focus {
            border: 1.5px solid #007bff;
            box-shadow: 0 0 0 1px #007bff20;
        }
        textarea.form-control {
            resize: vertical;
        }
        .btn-primary {
            background: linear-gradient(90deg,#007bff 60%,#0056b3 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 40px;
            font-size: 18px;
            font-weight: 500;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 10px rgba(0,123,255,0.05);
        }
        .btn-primary:hover, .btn-primary:focus {
            background: linear-gradient(90deg,#0056b3 60%,#007bff 100%);
            box-shadow: 0 4px 16px rgba(0,123,255,0.10);
        }
        input[type="file"].form-control-file {
            border: 0;
            background: #f2f2f2;
            padding: 8px;
        }
        @media (max-width: 700px) {
            .card-product {
                padding: 24px 8px 20px 8px;
                margin-top: 15px;
            }
            h1 {
                font-size: 24px;
            }
            .btn-primary {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="card-product">
        <h1>Thêm sản phẩm mới</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required placeholder="Nhập giá...">
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required placeholder="Nhập mô tả cho sản phẩm..."></textarea>
            </div>
            <div class="form-group">
                <label for="page">Trang hiển thị (page):</label>
                <select name="page" id="page" class="form-control">
                   
                    <option value="home">Home</option>
                    <option value="shop">Default shop</option>
                </select>
            </div>

            <div class="form-group">
                <label for="section">Khu vực hiển thị (section):</label>
                <select name="section" id="section" class="form-control">
                 
                    <option value="season_collection">Season Collection</option>
                    <option value="promotions">Promotions</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Thêm sản phẩm</button>
        </form>
    </div>
@endsection