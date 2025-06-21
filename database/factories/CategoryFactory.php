<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    public function definition(): array
    {
        $name = $this->faker->randomElement([
            'Hoa sinh nhật',
            'Hoa bữa tiệc',
            'hoa hen hò',
            'hoa dành cho thọ',
            'hoa fall',
            'hoa swing',
            'hoa winter',
            'hoa romantic',
            'hoa bede',
        ]);
        $description= 'hoa'.$name.'rấc đẹp';
        return [
            'name'=>$name,
            'description'=>$description,
        ];
    }
}
