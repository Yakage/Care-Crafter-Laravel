<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;

    protected $table = 'user_feedbacks';

    protected $fillable = ['user_id'.'message'];

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming a User model exists
    }
}
