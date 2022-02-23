<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'              => $this->faker->uuid(),
            'first_name'        => $this->faker->firstName(),
            'last_name'         => $this->faker->LastName(),
            'is_admin'          => $this->faker->boolean(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'avatar'            => 'avatar.png',
            'address'           => $this->faker->address(),
            'phone_number'      => $this->faker->phoneNumber(),
            'is_marketing'      => $this->faker->boolean(),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
