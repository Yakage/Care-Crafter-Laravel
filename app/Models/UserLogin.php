<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;
    protected $table = 'login_logs';
    protected $fillable = [
        'user_id',
        'login_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming a User model exists
    }
}
