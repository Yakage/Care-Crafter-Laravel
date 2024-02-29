<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepTrackerScore extends Model
{
    use HasFactory;
    protected $table = 'sleep_tracker_score';
    protected $fillable = [
        'user_id',
        'score_logs',
     
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
