<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => 'Bàn ghế gỗ', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Tủ gỗ', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Giường gỗ', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
