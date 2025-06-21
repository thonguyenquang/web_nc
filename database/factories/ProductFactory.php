<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'name'=>$name =$this->faker->randomElement(
                [
                    'Desert Mirage',
                    'Sweet flower',
                    'Rose Bouquet',
                    'Sunset Bliss',
                    'Ocean Breeze',
                    'Mountain Escape',
                    'Forest Retreat',

                ]
            ),
            'description' => 'hoa ' . $name . ' rấc là đẹp',
            'price' => $this->faker->randomFloat(2, 50000, 1000000),
        'image' => 'images/' . $this->faker->randomElement([
                'hoa1.webp',
                'hoa2.webp',
                'hoa3.webp',
                'hoa4.webp',
                'hoa5.webp',
                'hoa6.webp',

]),
            'category_id' => \App\Models\Category::factory(),

        ];
    }
}
