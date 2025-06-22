<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
       // Kiểm tra và tạo Admin nếu chưa tồn tại
       if (!User ::where('email', 'admin@gmail.com')->exists()) {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('123456'),
        ]);
    }
    // Kiểm tra và tạo User nếu chưa tồn tại
    if (!User ::where('email', 'user@gmail.com')->exists()) {
        User::create([
            'name' => 'User ',
            'email' => 'user@gmail.com',
            'is_admin' => false,
            'password' => bcrypt('123456'),
        ]);
    }
    // Kiểm tra và tạo Shipper nếu chưa tồn tại
    if (!User::where('email', 'shipper@example.com')->exists()) {
        User::create([
            'name' => 'Shipper Demo',
            'email' => 'shipper@example.com',
            'is_admin' => false,
            'role' => 'shipper',
            'password' => bcrypt('password123'),
        ]);
    }
    }
}
