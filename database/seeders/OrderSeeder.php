<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['Đang xử lý', 'Đang giao', 'Hoàn thành', 'Đã hủy'];


        $users = User::all();

        if ($users->isEmpty()) {
            echo "Không có người dùng nào trong cơ sở dữ liệu. Hãy tạo user trước.\n";
            return;
        }


        for ($i = 1; $i <= 30; $i++) {
            $user = $users->random();

            Order::create([
                'id' => $user->id,
                'order_date' => now()->subDays(rand(0, 60)),
                'total_amount' => rand(150000, 7000000),
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
