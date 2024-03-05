<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepTrackerLeaderboard extends Model
{
    use HasFactory;
    protected $table = 'step_tracker_leaderboard';
    protected $fillable = [
        'user_id',
        'name',
        'score',
        'steps',
        'date',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
