<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'visit_date',
        'symptoms',
        'diagnosis',
        'treatment',
        'vital_signs',
        'allergies',
        'medications',
        'lab_results',
        'notes'
    ];

    protected $casts = [
        'visit_date' => 'date',
        'vital_signs' => 'array',
        'allergies' => 'array',
        'medications' => 'array',
        'lab_results' => 'array'
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
}
