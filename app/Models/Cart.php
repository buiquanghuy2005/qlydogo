<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id'; // ✅ Khóa chính không phải là "id"
    protected $fillable = ['id']; // id ở đây là user_id

    // Quan hệ tới cart_items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'cart_id'); // ✅
    }

    // Quan hệ tới user
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id'); // user_id
    }
}
