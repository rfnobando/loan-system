<?php

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Installment>
 */
class InstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_id' => Loan::factory(),
            'amount' => $this->faker->numberBetween(300000, 5000000) / 100,
            'expiration_date' => $this->faker->dateTimeBetween('-5 week', '+5 weeks'),
            'paid_at' => null
        ];
    }
}
