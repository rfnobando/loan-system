<?php

namespace App\Services;

use App\Models\Installment;
use Carbon\Carbon;

class InstallmentService
{
    public function generateInstallments($installmentCount, $installmentAmount, $loanId, $loanBilling)
    {
        $currentDate = Carbon::now();

        $installment = [
            'loan_id' => $loanId,
            'amount' => $installmentAmount,
            'status' => 'Pendiente'
        ];
        
        if ($loanBilling == 'Semanal') {
            for ($i = 1; $i <= $installmentCount; $i++) {
                $installment['expiration_date'] = $currentDate->copy()->addWeek($i);
                Installment::create($installment);
            }
        }

        if ($loanBilling == 'Quincenal') {
            for ($i = 1; $i <= $installmentCount; $i++) {
                $installment['expiration_date'] = $currentDate->copy()->addDays($i * 15);
                Installment::create($installment);
            }
        }

        if ($loanBilling == 'Mensual') {
            for ($i = 1; $i <= $installmentCount; $i++) {
                $installment['expiration_date'] = $currentDate->copy()->addMonth($i);
                Installment::create($installment);
            }
        }
    }
}
