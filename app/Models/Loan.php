<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'billing',
        'status'
    ];

    /**
     * Get the customer that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the installments for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function installments(): HasMany
    {
        return $this->hasMany(Installment::class)->orderBy('expiration_date');
    }

    public function updateStatus()
    {
        $areUnpaidInstallments = $this->installments()->where('status', 'Pendiente')->exists();
        $status = $areUnpaidInstallments ? 'Pendiente' : 'Pagado';
        $this->update(['status' => $status]);
    }

}
