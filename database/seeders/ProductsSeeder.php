<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SoldProducts;
use App\Models\Review;

class ProductsSeeder extends Seeder
{

    public function run():void
    {
        Product::factory(100)
                ->has(Review::factory()->count(2))
                ->has(SoldProducts::factory()->count(2))
                ->create();
    }
}
