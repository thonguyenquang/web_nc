<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();
        
        foreach ($products as $product) {
            // Mỗi sản phẩm có 3-7 đánh giá ngẫu nhiên từ các user khác nhau
            $reviewUsers = $users->random(min(7, max(3, $users->count())));
            foreach ($reviewUsers as $user) {
                Review::factory()->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
