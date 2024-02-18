    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class SleepTracker extends Model
    {
        protected $fillable = [
            'user_id',
            'time',
            'wake_up_time',
            'sleep_time', 
            'time_slept', 
            'total_sleep_time',
            'sleep_score'
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
