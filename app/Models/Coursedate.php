<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursedate extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'scheduled_date' => 'datetime'
    ];

    public function booking() {
        return $this->hasMany(Booking::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
