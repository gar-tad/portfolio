<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Product;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(20, 2),
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->paragraphs(5, true)
        ];
    }
}
