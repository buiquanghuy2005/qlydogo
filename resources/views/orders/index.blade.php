@extends('layouts.myapp')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4" style="color: #8B4513;">🧾 Danh sách đơn hàng của bạn</h2>

    @if($orders->isEmpty())
    <div class="alert alert-info">
        Bạn chưa có đơn hàng nào.
    </div>
    @else
    <div class="card shadow-sm p-4">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->order_id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ number_format($order->total_price) }} đ</td>
                    <td>
                        <span class="badge bg-success">{{ $order->status ?? 'Hoàn thành' }}</span>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-sm btn-outline-primary">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection