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


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
