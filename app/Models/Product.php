<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'category_id',
        'description',
        'material',
        'dimensions',
        'price',
        'stock_quantity',
        'image_url',
    ];

    // Sản phẩm thuộc về 1 danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Sản phẩm có thể nằm trong nhiều giỏ hàng
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    // Sản phẩm có thể xuất hiện trong nhiều đơn hàng
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    // Sản phẩm có thể có nhiều đánh giá
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
