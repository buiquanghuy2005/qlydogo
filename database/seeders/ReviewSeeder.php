<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        if ($users->count() === 0 || $products->count() === 0) {
            $this->command->info('No users or products found, skipping reviews seeding.');
            return;
        }


        for ($i = 0; $i < 50; $i++) {
            Review::create([
                'product_id' => $products->random()->product_id,
                'id' => $users->random()->id,
                'rating' => rand(1, 5),
                'comment' => fake()->sentence(10),
            ]);
        }
    }
}
