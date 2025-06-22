<?php
namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1,
            'product_id' => Product::inRandomOrder()->first()?->id ?? 1,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
