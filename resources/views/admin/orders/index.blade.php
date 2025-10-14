@extends('layouts.myapp')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">📦 Quản lý đơn hàng</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>#{{ $order->order_id }}</td>
                <td>{{ $order->user->name ?? 'Không xác định' }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->order_id) }}" class="btn btn-sm btn-primary">👁️
                        Xem</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection