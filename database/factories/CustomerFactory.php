<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'phone_number' => $this->faker->numerify('11 ####-####'),
            'email' => $this->faker->email(),
            'dni_number' => $this->faker->numerify('########'),
            'dni_frontpic' => 'uploads/dni-frontpic-example.jpg',
            'dni_backpic' => 'uploads/dni-backpic-example.jpg'
        ];
    }
}
