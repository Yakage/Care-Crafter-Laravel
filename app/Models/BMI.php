<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    use HasFactory;
    protected $table = 'bmi';
    protected $fillable = [
        'user_id',
        'results'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
