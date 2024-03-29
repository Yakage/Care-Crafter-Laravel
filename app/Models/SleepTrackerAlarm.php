<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepTrackerAlarm extends Model
{
    use HasFactory;
    protected $table = 'sleep_tracker_alarm';
    protected $fillable = [
        'user_id',
        'daily_goal',
        'time',
        'date',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
