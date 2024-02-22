<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class SleepTrackerController extends Controller{
    //For Wake and Sleep Time
    public function indexWakeandSleepTime(User $user){
        $wakeandSleepTime = SleepTracker::select(['wake_up_time', 'sleep_time'])->get();
    
        if ($wakeandSleepTime->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($wakeandSleepTime);
    }

    public function createWakeandSleepTime(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'wake_up_time' => 'required',
            'sleep_time' => 'required'
            
        ]);

        $sleepTrackers = SleepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'time' => null,
            'wake_up_time' => $request->input('wake_up_time'),
            'sleep_time' => $request->input('sleep_time'),
            'time_slept' => null,
            'total_sleep_time' => null,
            'sleep_score' => null
        ]);

        return response()->json(['message' => 'Wake up Time and Sleep Time is created for this user', $sleepTrackers]);

    }

    public function updateWakeandSleepTime(Request $request, $id){
        //$user = User::find($id);
        $wakeandSleepTime = SleepTracker::findOrFail($id);
        $wakeandSleepTime->update([
            'user_id' => null,
            'time' => null,
            'wake_up_time' => $request->input('wake_up_time'),
            'sleep_time' => $request->input('sleep_time'),
            'time_slept' => null,
            'total_sleep_time' => null,
            'sleep_score' => null]);
        return response()->json(['message' => 'Wake up Time and Sleep Time is created for this user', $wakeandSleepTime]);
    }

    public function destroyWakeandSleepTime($id)
    {
        SleepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Wake and Sleep Time deleted successfully'], 200);
    }


    //For Total Time Slept
    public function indexTotalSleepTime(){
        $totalSleepTime = SleepTracker::select('total_sleep_time')->get();
    
        if ($totalSleepTime->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($totalSleepTime);
    }

    public function createTotalSleepTime(Request $request){
        $request->validate([
            'total_sleep_time' => 'required'
        ]);

        $totalTimeSlept = SleepTracker::create([
            'user_id' => null,
            'time' => null,
            'wake_up_time' => null,
            'sleep_time' => null,
            'time_slept' => null,
            'total_sleep_time' => $request->input('total_sleep_time'),
            'sleep_score' => null
        ]);
        return response()->json(['message' => 'Total Sleep Time is created for this user', $totalTimeSlept]);
    }


    public function updateTotalSleepTime(Request $request, $id)
    {
        $totalTimeSlept = SleepTracker::findOrFail($id);
        $totalTimeSlept->update([
            'user_id' => null,
            'time' => null,
            'wake_up_time' => null,
            'sleep_time' => null,
            'time_slept' => null,
            'total_sleep_time' => $request->input('total_sleep_time'),
            'sleep_score' => null]);
            return response()->json(['message' => 'Total Sleep Time is created for this user', $totalTimeSlept]);
    }

    public function destroyTotalSleepTime($id)
    {
        SleepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Total Sleep Time deleted successfully'], 200);
    }


    //For Sleep Score
    public function indexSleepScore(){
        $sleepScore = SleepTracker::select('sleep_score')->get();
    
        if ($sleepScore->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($sleepScore);
    }

    public function createSleepScore(Request $request){
        $request->validate([
            'sleep_score' => 'required'
        ]);

        $sleepScore = SleepTracker::create([
            'user_id' => null,
            'time' => null,
            'wake_up_time' => null,
            'sleep_time' => null,
            'time_slept' => null,
            'total_sleep_time' => null,
            'sleep_score' => $request->input('sleep_score')
        ]);
        return response()->json(['message' => 'Sleep Score is created for this user', $sleepScore]);
    }


    public function updateSleepScore(Request $request, $id)
    {
        $sleepScore = SleepTracker::findOrFail($id);
        $sleepScore->update(['user_id' => null,
            'time' => null,
            'wake_up_time' => null,
            'sleep_time' => null,
            'time_slept' => null,
            'total_sleep_time' => null,
            'sleep_score' => $request->input('sleep_score')
        ]);
        return response()->json(['message' => 'Sleep Score is created for this user', $sleepScore]);
    }

    public function destroySleepScore($id)
    {
        SleepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Sleep Score deleted successfully'], 200);
    }

}
