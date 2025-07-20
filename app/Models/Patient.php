<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'blood_group',
        'emergency_contact',
        'medical_history',
        'insurance_number',
        'registration_date'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'registration_date' => 'date',
    ];

    // Relationships
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    // Accessor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
