<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'floor',
        'capacity',
        'status',
        'equipment',
        'daily_rate'
    ];

    protected $casts = [
        'equipment' => 'array',
        'daily_rate' => 'decimal:2'
    ];

    // Relationships
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
