<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SleepTrackerAlarm;
use App\Models\SleepTrackerScore;
use App\Models\User;
use Illuminate\Http\Request;

class SleepTrackerController extends Controller
{
    public function getHistoryOfSleepTracker(SleepTrackerAlarm $sleepTrackerAlarm, SleepTrackerScore $sleepTrackerScore){
        $user = User::all();
        $alarms = SleepTrackerAlarm::where('user_id', auth()->id())->get();
        $scores = SleepTrackerScore::where('user_id', auth()->id())->get();


        return view('user.sleep-tracker.history', compact('alarms', 'scores'));
    }
}
