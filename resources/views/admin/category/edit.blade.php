@extends('admin.layouts.admin')

@section('title', 'Sửa danh mục')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white border-0 rounded-top-4 pb-0">
                    <h4 class="mb-0" style="font-weight:700; color:#5f0a87;">Sửa danh mục</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" name="name" id="name" class="form-control rounded-3" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control rounded-3" rows="3">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="d-flex center justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-success px-4 rounded-pill">Lưu thay đổi</button>
                        </div>
                    </form>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4 rounded-pill w-100">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
