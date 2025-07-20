<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'head_doctor_id',
        'location',
        'phone',
        'status'
    ];

    // Relationships
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function headDoctor()
    {
        return $this->belongsTo(Doctor::class, 'head_doctor_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
