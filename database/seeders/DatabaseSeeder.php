<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ShipperSeeder;
use Database\Seeders\ReviewSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            AdminSeeder::class,
            ShipperSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class, // Thêm dòng này để gọi seeder đánh giá
        ]);
    }
}
