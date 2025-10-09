@extends('layouts.myapp')

@section('title', $product->product_name)

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/500x400?text=No+Image' }}"
                class="img-fluid rounded shadow" alt="{{ $product->product_name }}">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold">{{ $product->product_name }}</h2>
            <p class="text-muted">Danh mục: {{ $product->category->category_name ?? 'Không có' }}</p>
            <h4 class="text-danger fw-bold mb-3">
                {{ number_format($product->price, 0, ',', '.') }} VNĐ
            </h4>

            <p><strong>Vật liệu:</strong> {{ $product->material ?? 'Không rõ' }}</p>
            <p><strong>Kích thước:</strong> {{ $product->dimensions ?? 'Không rõ' }}</p>

            <p class="mt-4">{{ $product->description }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
                ← Quay lại danh sách
            </a>
        </div>
    </div>

    {{-- Đánh giá --}}
    <div class="mt-5">
        <h4 class="fw-bold mb-3">⭐ Đánh giá sản phẩm</h4>
        @forelse ($product->reviews as $review)
        <div class="border-bottom py-2">
            <strong>{{ $review->user->name ?? 'Người dùng ẩn danh' }}</strong>
            <span class="text-warning">{{ str_repeat('★', $review->rating) }}</span>
            <p class="mb-0">{{ $review->comment }}</p>
        </div>
        @empty
        <p>Chưa có đánh giá nào.</p>
        @endforelse
    </div>
</div>
@endsection