@extends('layouts.myapp')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold mb-4">➕ Thêm sản phẩm mới</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category_id" class="form-select">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Vật liệu</label>
                <input type="text" name="material" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Kích thước</label>
                <input type="text" name="dimensions" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="stock_quantity" class="form-control" min="0" value="1">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá (VNĐ)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">URL ảnh sản phẩm (từ mạng)</label>
            <input type="text" name="image_url" class="form-control" placeholder="https://example.com/image.jpg">
        </div>

        <button type="submit" class="btn btn-primary">💾 Lưu sản phẩm</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection