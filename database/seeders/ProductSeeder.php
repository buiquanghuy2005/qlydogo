<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'product_name' => 'Bàn ăn gỗ sồi',
                'description' => 'Bàn ăn gỗ sồi 6 ghế sang trọng.',
                'material' => null,
                'dimensions' => null,
                'price' => 8500000,
                'stock_quantity' => 10,
                'image_url' => 'https://ibie.vn/images/detailed/55/Naw.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Tủ quần áo gỗ xoan đào',
                'description' => 'Tủ gỗ 3 cánh, thiết kế cổ điển.',
                'material' => null,
                'dimensions' => null,
                'price' => 12500000,
                'stock_quantity' => 5,
                'image_url' => 'https://giuongtudep.vn/data/upload/mat-truoc-tu-quan-ao-go-tu-nhien-2-tang-ta86.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Giường gỗ lim',
                'description' => 'Giường đôi gỗ lim chắc chắn.',
                'material' => null,
                'dimensions' => null,
                'price' => 15000000,
                'stock_quantity' => 3,
                'image_url' => 'https://dogohiephien.vn/wp-content/uploads/2022/07/giuong-go-lim-dep-2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
