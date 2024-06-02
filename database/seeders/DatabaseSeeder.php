<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $customer = Customer::factory()
        //     ->hasOrders(3, [
        //         'total' => 500.0,
        //         'orderDate' => now(),
        //     ])
        //     ->create();

        // $orders = Order::factory(3)->create([
        //     'customer_id' => $customer->id
        // ]);

        // foreach ($orders as $order) {
        //     OrderDetails::factory(2)->create([
        //         'order_id' => $order->id,
        //         'product_id' => Product::factory()->create()->id,
        //     ]);
        // }

    }
}
