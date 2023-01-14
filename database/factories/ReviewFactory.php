<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    // protected $fillable = ['product_id', 'user_name', 'rating', 'comment'];

        return [
            'product_id' => 7,
            'user_name' => 'Random',
            'comment' => 'Lorem ipsum sil dolor amet',
            'rating' => fake()->randomElement(1,2,3,4,5),
            'user_id' => 7,

        ];
    }
}
