<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category', 'reviews.user')->findOrFail($id);

        $reviews = $product->reviews()->with('user')->orderBy('created_at', 'desc')->paginate(5);

        return view('products.show', compact('product', 'reviews'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $category = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $imagePath = 'uploads/products/' . $filename;
        }


        Product::create([
            'product_name' => $request->product_name,
            'category_id' => $category->category_id,
            'description' => $request->description,
            'material' => $request->material,
            'dimensions' => $request->dimensions,
            'stock_quantity' => $request->stock_quantity,
            'price' => $request->price,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);


        $category = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);

        $imagePath = $product->image_url;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $imagePath = 'uploads/products/' . $filename;
        }

        $product->update([
            'product_name' => $request->product_name,
            'category_id' => $category->category_id,
            'description' => $request->description,
            'material' => $request->material,
            'dimensions' => $request->dimensions,
            'stock_quantity' => $request->stock_quantity,
            'price' => $request->price,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_url && file_exists(public_path($product->image_url))) {
            unlink(public_path($product->image_url));
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
