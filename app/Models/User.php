<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Một người dùng có thể có nhiều đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'id');
    }

    // Một người dùng có thể viết nhiều đánh giá
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id', 'id');
    }

    // Một người dùng có thể có nhiều sản phẩm trong giỏ hàng
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'id', 'id');
    }
}
