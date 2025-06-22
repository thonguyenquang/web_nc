<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $statuses = ['pending', 'confirmed', 'shipped', 'completed', 'canceled'];
        $shipperIds = Shipper::pluck('id')->toArray();
        $status = $this->faker->randomElement($statuses);
        $shipper_id = null;
        if ($status !== 'pending') {
            $shipper_id = $this->faker->randomElement($shipperIds);
        }
        return [
            'user_id' => User::factory(),
            'fullname' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'province' => $this->faker->city(),
            'district' => $this->faker->citySuffix(),
            'ward' => $this->faker->streetSuffix(),
            'address' => $this->faker->address(),
            'note' => $this->faker->sentence(),
            'total_price' => $this->faker->numberBetween(100000, 2000000),
            'status' => $status,
            'shipper_id' => $shipper_id,
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'updated_at' => now(),
        ];
    }
}
