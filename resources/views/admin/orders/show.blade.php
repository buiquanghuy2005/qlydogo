@extends('layouts.myapp')

@section('title', 'Chi tiết đơn hàng #' . $order->order_id)

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Chi tiết đơn hàng #{{ $order->order_id }}</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Thông tin khách hàng</h5>
            <p><strong>Tên:</strong> {{ $order->user->name ?? 'Không rõ' }}</p>
            <p><strong>Email:</strong> {{ $order->user->email ?? 'Không rõ' }}</p>
            <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} ₫</p>

            <form action="{{ route('admin.orders.updateStatus', $order->order_id) }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label"><strong>Trạng thái đơn hàng:</strong></label>
                    <select name="status" id="status" class="form-select" style="width:auto;display:inline-block;">
                        <option value="Đang xử lý" {{ $order->status == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý
                        </option>
                        <option value="Đang giao" {{ $order->status == 'Đang giao' ? 'selected' : '' }}>Đang giao
                        </option>
                        <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành
                        </option>
                        <option value="Đã hủy" {{ $order->status == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm ms-2">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    <h4 class="mb-3">Danh sách sản phẩm</h4>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->product->product_name ?? 'Sản phẩm đã xóa' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->unit_price, 0, ',', '.') }} ₫</td>
                    <td>{{ number_format($detail->unit_price * $detail->quantity, 0, ',', '.') }} ₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection