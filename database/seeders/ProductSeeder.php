<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy ID category trong phương thức run()
        // $flowersId = Category::where('name', 'Flowers')->first()->id;
        // $treesId = Category::where('name', 'Trees')->first()->id;
        // $giftsId = Category::where('name', 'Gifts')->first()->id;
        // $birthdayId = Category::where('name', 'Birthday')->first()->id;


        Product::factory()->count(50)->create();
    }
}
