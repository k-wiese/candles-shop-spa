<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use App\Models\SoldProducts;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)
        ->has(Review::factory()->count(2))
        ->has(Order::factory()->has(SoldProducts::factory()->count(5))->count(4))
        ->create();
            
    }
}
