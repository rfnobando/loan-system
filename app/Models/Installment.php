<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installment extends Model
{
    use HasFactory;

    protected $casts = [
        'expiration_date' => 'datetime',
        'paid_at' => 'datetime'
    ];

    protected $fillable = [
        'loan_id',
        'amount',
        'status',
        'expiration_date',
        'paid_at'
    ];

    /**
     * Get the loan that owns the Installment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($installment) {
            $installment->status = 'Pendiente';
        });

        static::updated(function ($installment) {
            $installment->loan->updateStatus();
        });
    }
}
