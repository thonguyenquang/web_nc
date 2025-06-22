<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Shipper;
use App\Models\User;

class ShipperSeeder extends Seeder
{
    public function run(): void
    {
        $shippers = [
            [
                'name' => 'Nguyen Van Shipper',
                'phone' => '0901234567',
                'email' => 'shipper1@example.com',
            ],
            [
                'name' => 'Tran Thi Giao',
                'phone' => '0912345678',
                'email' => 'shipper2@example.com',
            ],
            [
                'name' => 'Le Van Van',
                'phone' => '0923456789',
                'email' => 'shipper3@example.com',
            ],
            [
                'name' => 'Pham Thi Thu',
                'phone' => '0934567890',
                'email' => 'shipper4@example.com',
            ],
            [
                'name' => 'Shipper Demo',
                'phone' => '0999999999',
                'email' => 'shipper@example.com',
            ],
        ];
        foreach ($shippers as $s) {
            $user = User::firstOrCreate(
                ['email' => $s['email']],
                [
                    'name' => $s['name'],
                    'password' => bcrypt('password123'),
                    'role' => 'shipper',
                    'is_admin' => false,
                ]
            );
            Shipper::create([
                'name' => $s['name'],
                'phone' => $s['phone'],
                'email' => $s['email'],
                'status' => 'active',
                'user_id' => $user->id,
            ]);
        }
    }
}
