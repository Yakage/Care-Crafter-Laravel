<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepTrackerLeaderboard extends Model
{
    use HasFactory;
    protected $table = 'sleep_tracker_leaderboard';
    protected $fillable = [
        'user_id',
        'score',
        'name',
        'sleeps',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
