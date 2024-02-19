<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepTracker extends Model
{   
    protected $table = 'step_tracker';
    protected $fillable = [
        'user_id',
        'current_steps_per_day',
        'total_steps_taken',
        'average_steps_taken',
        'daily_goal',
        'monthly_goal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
