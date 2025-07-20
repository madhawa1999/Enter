<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'department_id',
        'employee_id',
        'hire_date',
        'salary',
        'shift',
        'status',
        'qualifications',
        'address'
    ];

    protected $casts = [
        'hire_date' => 'date',
        'salary' => 'decimal:2',
        'qualifications' => 'array'
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Accessor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
