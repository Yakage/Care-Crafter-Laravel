<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterIntake extends Model
{
    protected $fillable = [
        'daily_goal',
        'total_intake', 
        'current_intake', 
        'reminder', 
        'today_log',
        'reminder_interval',
        'average_volume',
        'average_completion', 
        'drink_frequency'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
