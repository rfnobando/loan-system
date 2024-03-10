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
        $status = $this->faker->randomElement(['Pendiente', 'Vencida']);
        $expirationDate = '';

        if ($status == 'Vencida') {
            $expirationDate = $this->faker->dateTimeBetween('-10 weeks', '-1 week');
        } else {
            $expirationDate = $this->faker->dateTimeBetween('+1 week', '+5 weeks');
        }

        return [
            'loan_id' => Loan::factory(),
            'status' => $status,
            'expiration_date' => $expirationDate,
            'paid_at' => null
        ];
    }
}
