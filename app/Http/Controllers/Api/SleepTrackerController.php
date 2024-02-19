<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class SleepTrackerController extends Controller{
    public function indexWakeandSleepTime(User $user){
        $sleepTracker = $user->sleepTracker()->select('wake_up_time', 'sleep_time');
        return response()->json([
            'wake_up_time' => $sleepTracker->wake_up_time,
            'sleep_time' => $sleepTracker->sleep_time
        ]);
    }

    public function createWakeandSleepTime(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'wake_up_time' => 'required',
            'sleep_time' => 'required'
            
        ]);

        $sleepTrackers = SleepTracker::create([
            //'user_id' => $user->id,
            'wake_up_time' => $validatedData['wake_up_time'],
            'sleep_time' => $validatedData['sleep_time'],
        ]);

        return response()->json(['message' => 'Wake up Time and Sleep Time is created for this user', $sleepTrackers]);

    }

    public function updateWakeandSleepTime(Request $request, $id){
        //$user = User::find($id);
        $sleepTracker = SleepTracker::find($id);
        $validatedData = $request->validate([
            'wake_up_time' => 'required',
            'sleep_time' => 'required'
            
        ]);

        $sleepTracker->update($validatedData);
        return response()->json(['message' => 'Wake up Time and Sleep Time is created for this user', $sleepTracker]);

    }


}
