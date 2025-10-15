<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = Cart::firstOrCreate(['id' => Auth::id()]);
        $items = $cart->cartItems()->with('product')->get();

        return view('cart.index', compact('items'));
    }

    // Thêm sản phẩm vào giỏ
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['id' => Auth::id()]);

        $item = $cart->cartItems()->where('product_id', $productId)->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            $cart->cartItems()->create([
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $product->price,
                'cart_id' => $cart->cart_id,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    // Xoá sản phẩm khỏi giỏ
    public function remove($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return back()->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng');
    }
}
