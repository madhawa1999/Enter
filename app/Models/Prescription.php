<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'prescription_date',
        'status',
        'notes',
        'total_amount'
    ];

    protected $casts = [
        'prescription_date' => 'date',
        'total_amount' => 'decimal:2'
    ];

    // Relationships
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'prescription_medicines')
                    ->withPivot(['quantity', 'dosage', 'instructions'])
                    ->withTimestamps();
    }
}
