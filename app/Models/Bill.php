<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'bill_date',
        'total_amount',
        'paid_amount',
        'balance_amount',
        'payment_status',
        'payment_method',
        'discount',
        'tax',
        'services',
        'medicines',
        'room_charges',
        'notes'
    ];

    protected $casts = [
        'bill_date' => 'date',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'balance_amount' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'services' => 'array',
        'medicines' => 'array',
        'room_charges' => 'decimal:2'
    ];

    // Relationships
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Calculate balance amount
    public function calculateBalance()
    {
        return $this->total_amount - $this->paid_amount;
    }
}
