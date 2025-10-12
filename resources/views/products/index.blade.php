@extends('layouts.myapp')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">🪵 Quản lý sản phẩm nội thất</h1>

        {{-- ✅ Nút thêm sản phẩm - chỉ hiển thị khi là admin --}}
        @auth
        @if (Auth::user()->role === 'admin')
        <a href="{{ route('products.create') }}" class="btn btn-success">
            ➕ Thêm sản phẩm
        </a>
        @endif
        @endauth
    </div>

    {{-- Hiển thị thông báo khi thêm/sửa/xóa thành công --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($products->isEmpty())
    <div class="alert alert-info text-center">Chưa có sản phẩm nào.</div>
    @else
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x300?text=No+Image' }}"
                    class="card-img-top" alt="{{ $product->product_name }}" style="height: 230px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="text-muted mb-1">
                        💰 {{ number_format($product->price, 0, ',', '.') }} VNĐ
                    </p>
                    <p class="text-secondary small mb-3">
                        {{ Str::limit($product->description, 70, '...') }}
                    </p>

                    <div class="mt-auto d-flex justify-content-between">
                        {{-- Nút xem (ai cũng thấy) --}}
                        <a href="{{ route('products.show', $product->product_id) }}"
                            class="btn btn-outline-primary btn-sm">
                            👁 Xem
                        </a>

                        {{-- ✅ Chỉ ADMIN mới được Sửa / Xóa --}}
                        @auth
                        @if (Auth::user()->role === 'admin')
                        <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning btn-sm">
                            ✏️ Sửa
                        </a>

                        <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
                            class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑️ Xóa
                            </button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection