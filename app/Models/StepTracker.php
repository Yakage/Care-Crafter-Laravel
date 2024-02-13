<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepTracker extends Model
{
    protected $fillable = [
        'current_steps',
        'total_steps',
        'average_steps',
        'daily_goal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
