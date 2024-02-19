<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterIntake extends Model
{   
    protected $table = 'water_intake';
    protected $fillable = [
        'user_id',
        'daily_goal',
        'total_intake', 
        'current_intake', 
        'reminder', 
        'reminder_interval',
        'today_log',
        'average_volume',
        'average_completion', 
        'drink_frequency'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
