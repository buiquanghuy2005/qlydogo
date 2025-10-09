<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🏠 Trang danh sách sản phẩm
    public function index()
    {
        // Lấy toàn bộ sản phẩm cùng với thông tin danh mục
        $products = Product::with('category')->paginate(6);

        return view('products.index', compact('products'));
    }

    // 🔍 Trang chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::with('category', 'reviews.user')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // ➕ Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // 💾 Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,category_id',
            'image_url' => 'nullable|url',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }



    // ✏️ Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // 💾 Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // ❌ Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
