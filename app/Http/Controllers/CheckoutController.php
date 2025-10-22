<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();


        $cart = Cart::where('id', $user->id)->with('cartItems.product')->first();

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        DB::beginTransaction();

        try {

            $total = $cart->cartItems->sum(fn($item) => $item->price * $item->quantity);


            $order = Order::create([
                'id' => $user->id,
                'order_date' => now(),
                'total_amount' => $total,
                'status' => 'Đang xử lý',
                'shipping_address' => $request->input('shipping_address', 'Chưa cập nhật'),
            ]);


            foreach ($cart->cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->price,
                ]);
            }


            $cart->cartItems()->delete();

            DB::commit();


            return redirect()->route('orders.show', $order->order_id)
                ->with('success', 'Thanh toán thành công!');
        } catch (\Exception $e) {
            DB::rollBack();


            return redirect()->route('cart.index')->with('error', 'Lỗi khi thanh toán: ' . $e->getMessage());
        }
    }
}
