<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepTrackerLogs extends Model
{
    use HasFactory;
    protected $table = 'step_tracker_logs';
    protected $fillable = [
        'user_id',
        'step_history'
    ];

    
}
