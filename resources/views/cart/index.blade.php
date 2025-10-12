@extends('layouts.myapp')

@section('title', 'Giỏ hàng của bạn')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4" style="color: #8B4513;">🛒 Giỏ hàng của bạn</h2>

    @if($items->isEmpty())
    <p>Giỏ hàng của bạn đang trống.</p>
    @else
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($items as $item)
            @php $subtotal = $item->price * $item->quantity; $total += $subtotal; @endphp
            <tr>
                <td>{{ $item->product->product_name }}</td>
                <td>{{ number_format($item->price) }} đ</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($subtotal) }} đ</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', ['cart_item_id' => $item->cart_item_id]) }}">

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4 text-end">Tổng cộng: <strong>{{ number_format($total) }} đ</strong></h4>
    @endif
</div>
@endsection