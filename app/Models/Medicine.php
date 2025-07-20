<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'generic_name',
        'manufacturer',
        'category',
        'dosage_form',
        'strength',
        'price_per_unit',
        'stock_quantity',
        'minimum_stock',
        'expiry_date',
        'batch_number',
        'status'
    ];

    protected $casts = [
        'price_per_unit' => 'decimal:2',
        'expiry_date' => 'date'
    ];

    // Relationships
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_medicines')
                    ->withPivot(['quantity', 'dosage', 'instructions'])
                    ->withTimestamps();
    }

    // Check if medicine is low in stock
    public function isLowStock()
    {
        return $this->stock_quantity <= $this->minimum_stock;
    }

    // Check if medicine is expired
    public function isExpired()
    {
        return $this->expiry_date < now();
    }
}
