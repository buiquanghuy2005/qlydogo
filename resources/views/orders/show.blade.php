@extends('layouts.myapp')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4" style="color: #8B4513;"> Chi tiết đơn hàng</h2>

    {{-- Thông báo --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm p-4">
        <h5>Mã đơn hàng: <strong>#{{ $order->order_id }}</strong></h5>
        <p>Ngày đặt: {{ $order->order_date ? $order->order_date : $order->created_at->format('d/m/Y H:i') }}</p>
        <p>Trạng thái:
            <span class="badge bg-success">{{ $order->status ?? 'Đang xử lý' }}</span>
        </p>

        <hr>

        <h5>Danh sách sản phẩm</h5>
        <table class="table table-bordered align-middle mt-3">
            <thead class="table-light">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @if($order->orderDetails && $order->orderDetails->count() > 0)
                @foreach($order->orderDetails as $item)
                <tr>
                    <td>{{ $item->product->product_name ?? 'Sản phẩm đã bị xóa' }}</td>
                    <td>{{ number_format($item->unit_price) }} đ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->unit_price * $item->quantity) }} đ</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center text-muted">Không có sản phẩm nào trong đơn hàng này.</td>
                </tr>
                @endif
            </tbody>
        </table>

        <h4 class="text-end mt-3">
            Tổng cộng: <strong>{{ number_format($order->total_amount) }} đ</strong>
        </h4>
    </div>

    <div class="mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">⬅ Quay lại danh sách đơn hàng</a>
    </div>
</div>
@endsection