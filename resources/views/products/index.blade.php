@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">🪵 Danh sách sản phẩm nội thất</h1>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x300?text=No+Image' }}"
                    class="card-img-top" alt="{{ $product->product_name }}" style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="text-muted mb-1">💰 {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                    <p class="text-secondary small mb-3">
                        {{ Str::limit($product->description, 70, '...') }}
                    </p>
                    <a href="{{ route('products.show', $product->product_id) }}"
                        class="btn btn-outline-primary mt-auto">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection