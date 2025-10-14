@extends('layouts.myapp')

@section('content')
<div class="container text-center mt-5">
    <h2>🎉 Thanh toán thành công!</h2>
    <p>Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là <strong>#{{ $order->id }}</strong></p>
    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Về trang chủ</a>
</div>
@endsection