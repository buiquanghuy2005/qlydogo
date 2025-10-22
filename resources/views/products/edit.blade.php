@extends('layouts.myapp')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Chỉnh sửa sản phẩm</h2>

    <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tên sản phẩm -->
        <div class="mb-3">
            <label for="product_name" class="form-label fw-bold">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control"
                value="{{ old('product_name', $product->product_name) }}" required>
        </div>

        <!-- Danh mục -->
        <div class="mb-3">
            <label for="category_id" class="form-label fw-bold">Danh mục</label>
            <select name="category_id" class="form-select">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $c)
                <option value="{{ $c->category_id }}" {{ $product->category_id == $c->category_id ? 'selected' : '' }}>
                    {{ $c->category_name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Chất liệu -->
        <div class="mb-3">
            <label for="material" class="form-label fw-bold">Chất liệu</label>
            <input type="text" name="material" class="form-control" value="{{ old('material', $product->material) }}">
        </div>

        <!-- Kích thước -->
        <div class="mb-3">
            <label for="dimensions" class="form-label fw-bold">Kích thước</label>
            <input type="text" name="dimensions" class="form-control"
                value="{{ old('dimensions', $product->dimensions) }}">
        </div>

        <!-- Giá -->
        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Giá (VNĐ)</label>
            <input type="number" name="price" class="form-control" step="0.01"
                value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Số lượng -->
        <div class="mb-3">
            <label for="stock_quantity" class="form-label fw-bold">Số lượng tồn</label>
            <input type="number" name="stock_quantity" class="form-control"
                value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
        </div>

        <!-- Ảnh hiện tại -->
        @if($product->image_url)
        <div class="mb-3 text-center">
            <label class="form-label fw-bold">Ảnh hiện tại</label><br>
            <img src="{{ asset($product->image_url) }}" alt="Ảnh sản phẩm" class="rounded shadow"
                style="max-width: 200px;">
        </div>
        @endif

        <!-- Upload ảnh mới -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Chọn ảnh mới (nếu muốn thay)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Mô tả</label>
            <textarea name="description" class="form-control"
                rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Nút -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">← Quay lại</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
@endsection