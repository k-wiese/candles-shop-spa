<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstNameFemale(),
            'price' => fake()->randomNumber(2),
            'photo_sq' => fake()->randomElement(array('storage/images/sq_1669297332swieczka (10).jpg','storage/images/sq_1669216811swieczka (6).jpg')),
            'photo' => fake()->randomElement(array('storage/images/sq_1669297332swieczka (10).jpg','storage/images/sq_669216811swieczka (6).jpg')),
            'description' => 'Desc',
            'color' => fake()->randomElement(array('Black','White','Blue','Yellow','Transparent')),
            'discount' => fake()->randomElement(array(1,null)),
            'discount_value' => fake()->randomElement(array(5,10,15)),
            'type' => fake()->randomElement(array('candle','other')),
        ];
    }
}
