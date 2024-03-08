<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterIntakeLogs extends Model
{
    use HasFactory;
    protected $table = 'water_intake_logs';
    protected $fillable = [
        'user_id',
        'daily_goal',
        'current_water',
        'history',
    ];
}
