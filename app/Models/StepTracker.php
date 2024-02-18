<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepTracker extends Model
{
    protected $fillable = [
        'user_id',
        'current_steps_per_day',
        'total_steps_taken',
        'average_steps_taken',
        'daily_goal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
