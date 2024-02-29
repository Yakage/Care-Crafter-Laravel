<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 
        'email',
        'birthday',
        'gender',
        'height',
        'weight',
        'password', 
        'role',
        'status',
        'api_token'
    ];

    public function stepTracker()
    {
        return $this->hasOne(StepTracker::class);
    }

    public function SleepTrackerAlarm()
    {
        return $this->hasMany(SleepTrackerAlarm::class, 'user_id');
    }

    public function SleepTrackerScore()
    {
        return $this->hasMany(SleepTrackerScore::class, 'user_id');
    }
    public function waterIntake()
    {
        return $this->hasMany(WaterIntake::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
