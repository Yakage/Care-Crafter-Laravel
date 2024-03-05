<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterIntakeLeaderboard extends Model
{
    use HasFactory;
    protected $table = 'water_intake_leaderboard';
    protected $fillable = [
        'user_id',
        'name',
        'water',
        'date',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
