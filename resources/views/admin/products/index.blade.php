@extends('admin.layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/product.css') }}">

@endsection
@section('content')

     {{-- thông báo tìm kiếm --}}
     <hr>
    @if(request()->has('keyword'))
        <p>Kết quả tìm kiếm cho từ khóa: <strong>{{ request('keyword') }}</strong></p>
    @endif
    <hr>
     <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Giá sản phẩm</th>
                <th>danh mục</th>
                <th>mô tả</th>
                <th>ảnh</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description }}</td>
                    {{-- <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"></td> --}}
                    {{-- <td> <img src="{{ asset($product->image) }}" alt="hoa" width="100"></td> --}}
                    <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="100"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có sản phẩm nào</td>
                </tr>
            @endforelse
        </tbody>
     </table>
          <button class="btn btn-primary"><a href="{{ route('admin.products.create') }}" style="color: white; text-decoration: none;">Thêm sản phẩm mới</a></button>



          <hr>
          <div class="">
            {{$products->appends(request()->all())->links()}}
          </div>
@endsection

