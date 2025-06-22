<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy danh sách shipper
        $shippers = \App\Models\Shipper::all();
        // Lấy danh sách user (không phải admin, không phải shipper)
        $users = \App\Models\User::where('is_admin', false)->where(function($q){
            $q->whereNull('role')->orWhere('role', '!=', 'shipper');
        })->get();
        // Tạo 30 đơn hàng đã gán shipper (trạng thái random, gồm cả 'confirmed', trừ 'pending')
        $statuses = ['confirmed', 'assigned', 'in_delivery', 'delivered', 'cancel_requested', 'cancelled'];
        foreach (range(1, 30) as $i) {
            $user = $users->random();
            $shipper = $shippers->random();
            $status = $statuses[array_rand($statuses)];
            \App\Models\Order::factory()->create([
                'shipper_id' => $shipper->id,
                'status' => $status,
                'user_id' => $user->id,
                'fullname' => $user->name,
                'email' => $user->email,
            ]);
        }
        // Tạo 10 đơn hàng chưa gán shipper (trạng thái 'pending')
        foreach (range(1, 10) as $i) {
            $user = $users->random();
            \App\Models\Order::factory()->create([
                'shipper_id' => null,
                'status' => 'pending',
                'user_id' => $user->id,
                'fullname' => $user->name,
                'email' => $user->email,
            ]);
        }
    }
}
