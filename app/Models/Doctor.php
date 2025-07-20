<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'license_number',
        'specialization',
        'experience_years',
        'department_id',
        'qualification',
        'consultation_fee',
        'available_days',
        'available_time_start',
        'available_time_end',
        'status'
    ];

    protected $casts = [
        'available_days' => 'array',
        'available_time_start' => 'datetime:H:i',
        'available_time_end' => 'datetime:H:i',
        'consultation_fee' => 'decimal:2'
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    // Accessor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
