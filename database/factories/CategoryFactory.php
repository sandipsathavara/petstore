<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'  => $this->faker->uuid(),
            'title' => str_replace('-', ' ', $this->faker->slug(3)),
            'slug'  => $this->faker->slug(3),
        ];
    }
}
