<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'        => $this->faker->uuid(),
            'title'       => str_replace('-', ' ', $this->faker->slug(7)),
            'price'       => $this->faker->randomFloat(500,100,500),
            'description' => $this->faker->sentence(),
            'metadata'    => json_encode(["brand" => $this->faker->uuid()]),
        ];
    }
}
