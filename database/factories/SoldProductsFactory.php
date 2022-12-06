<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldProducts>
 */
class SoldProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

    // protected $fillable = ['name','price','qty','product_id','order_id'];

        return [
            'name' => 'Name of product',
            'price'=>123,
            'qty'=>2,
            'product_id'=>7,
            'order_id'=> 7,
            'user_id'=>7


        ];
    }
}
