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
            {{-- 🛒 Nút thêm vào giỏ hàng --}}
            @auth
            <form action="{{ route('cart.add', $product->product_id) }}" method="POST" class="mt-3">
                @csrf
                <div class="input-group" style="max-width: 200px;">
                    <input type="number" name="quantity" value="1" min="1" class="form-control text-center">
                    <button type="submit" class="btn btn-success">
                        🛒 Thêm vào giỏ hàng
                    </button>
                </div>
            </form>
            @else
            <p class="mt-3">
                <a href="{{ route('login') }}" class="text-primary">Đăng nhập</a> để thêm vào giỏ hàng.
            </p>
            @endauth

        </div>
    </div>

    {{-- ⭐ Khu vực đánh giá --}}
    <div class="mt-5">
        <h4 class="fw-bold mb-3">⭐ Đánh giá sản phẩm</h4>

        {{-- Form thêm đánh giá --}}
        @auth
        <form action="{{ route('reviews.store', $product->product_id) }}" method="POST" class="mb-4 border p-3 rounded">
            @csrf
            <div class="mb-3">
                <label for="rating" class="form-label fw-semibold">Chọn số sao:</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">-- Chọn --</option>
                    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }} sao</option>
                        @endfor
                </select>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label fw-semibold">Nhận xét:</label>
                <textarea name="comment" id="comment" class="form-control" rows="3"
                    placeholder="Nhập nhận xét của bạn..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
        </form>
        @else
        <p><a href="{{ route('login') }}">Đăng nhập</a> để gửi đánh giá.</p>
        @endauth

        {{-- Hiển thị các đánh giá --}}
        @forelse ($product->reviews as $review)
        <div class="border-bottom py-2">
            <strong>{{ $review->user->name ?? 'Người dùng ẩn danh' }}</strong>
            <span class="text-warning">{{ str_repeat('★', $review->rating) }}</span>
            <p class="mb-1">{{ $review->comment }}</p>
            <small class="text-muted">{{ $review->created_at->format('d/m/Y H:i') }}</small>

            {{-- Nút xóa chỉ hiện với chủ review --}}
            @auth
            @if (Auth::id() === $review->id)
            <form action="{{ route('reviews.destroy', $review->review_id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger ms-2">Xóa</button>
            </form>
            @endif
            @endauth
        </div>
        @empty
        <p>Chưa có đánh giá nào.</p>
        @endforelse
    </div>
</div>
@endsection