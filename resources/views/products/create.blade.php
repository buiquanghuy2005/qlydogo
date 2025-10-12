@extends('layouts.myapp')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold mb-4">➕ Thêm sản phẩm mới</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        {{-- Tên sản phẩm --}}
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        {{-- Danh mục: có thể gõ hoặc chọn --}}
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <input type="text" name="category_name" class="form-control" list="categoryList"
                placeholder="Nhập hoặc chọn danh mục..." required>
            <datalist id="categoryList">
                @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">
                    @endforeach
            </datalist>
        </div>

        {{-- Mô tả --}}
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        {{-- Vật liệu - Kích thước - Số lượng --}}
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

        {{-- Giá --}}
        <div class="mb-3">
            <label class="form-label">Giá (VNĐ)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        {{-- Ảnh --}}
        <div class="mb-3">
            <label class="form-label">URL ảnh sản phẩm (từ mạng)</label>
            <input type="text" name="image_url" class="form-control" placeholder="https://example.com/image.jpg">
        </div>

        {{-- Nút --}}
        <button type="submit" class="btn btn-primary">💾 Lưu sản phẩm</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection