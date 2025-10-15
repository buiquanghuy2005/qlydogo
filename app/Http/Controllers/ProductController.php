<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Trang danh sách sản phẩm
    public function index()
    {
        $products = Product::with('category')->paginate(6);
        return view('products.index', compact('products'));
    }

    // Trang chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::with('category', 'reviews.user')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Lưu sản phẩm mới (có thể nhập danh mục mới)
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category_name' => 'required|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        //Tìm hoặc tạo danh mục mới nếu chưa có
        $category = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);

        //Tạo sản phẩm mới
        Product::create([
            'product_name' => $request->product_name,
            'category_id' => $category->category_id,
            'description' => $request->description,
            'material' => $request->material,
            'dimensions' => $request->dimensions,
            'stock_quantity' => $request->stock_quantity,
            'price' => $request->price,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm (có thể đổi danh mục)
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'category_name' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        // Xử lý danh mục
        $category = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);

        // Cập nhật sản phẩm
        $product->update([
            'product_name' => $request->product_name,
            'category_id' => $category->category_id,
            'description' => $request->description,
            'material' => $request->material,
            'dimensions' => $request->dimensions,
            'stock_quantity' => $request->stock_quantity,
            'price' => $request->price,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
