<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\Installment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(10)
            ->has(
                Loan::factory()
                    ->count(2)
                    ->has(
                        Installment::factory()->count(3)
                    )
            )
            ->create();
    }
}
