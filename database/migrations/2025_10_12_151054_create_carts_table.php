<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('cart_id'); // 🔹 Tên cột khóa chính tùy chỉnh
            $table->unsignedBigInteger('id'); // 🔹 Khóa ngoại trỏ đến bảng users
            $table->timestamps();

            // 🔹 Ràng buộc khóa ngoại đúng cú pháp
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
