<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::firstOrCreate(['id' => Auth::id()]);
        $items = $cart->cartItems()->with('product')->get();

        return view('cart.index', compact('items'));
    }


    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['id' => Auth::id()]);

        $quantity = (int) $request->input('quantity', 1);

        $item = $cart->cartItems()->where('product_id', $productId)->first();

        if ($item) {
            $item->quantity += $quantity;
            $item->save();
        } else {
            $cart->cartItems()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'cart_id' => $cart->cart_id,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }



    public function remove($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return back()->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng');
    }
}
