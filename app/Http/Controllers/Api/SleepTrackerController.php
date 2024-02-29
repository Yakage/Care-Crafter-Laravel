<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\SleepTrackerAlarm;
use App\Models\SleepTrackerScore;
use App\Models\User;

class SleepTrackerController extends Controller{
    
    public function getAlarm(SleepTrackerAlarm $sleepTrackerAlarm){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $alarm = $sleepTrackerAlarm->get();
        return response()->json($alarm);
    }

    public function createAlarm(Request $request){
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'time' => 'required|string',
            'date' => 'required|string',
        ]);

        $alarm = SleepTrackerAlarm::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
            
        ]);

        return response()->json(['message' => 'Alarm for Sleep Tracker is created for this user', $alarm]);

    }

    public function updateAlarm(Request $request){
        $user = Auth::user();
        $request->validate([
            'id' => 'required', // Ensure the ID is provided in the request
            'title' => 'required',
            'message' => 'required',
            'time' => 'required|date_format:H:i A',
            'date' => 'required|date',
        ]);
    
        // Retrieve the alarm based on the provided ID and user ID
        $alarm = SleepTrackerAlarm::where('id', $request->input('id'))
            ->where('user_id', $user->id)
            ->first();
    
        if(!$alarm) {
            return response()->json(['message' => 'Alarm not found'], 404);
        }
    
        // Update the alarm attributes with the new values provided in the request
        $alarm->update([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
        ]);
    
        return response()->json(['message' => 'Alarm for Sleep Tracker is updated for this user', 'alarm' => $alarm]);
    }
    
    

    public function deleteAlarm($id) {
        $user = Auth::user();
    
        // Delete the alarm with the specified ID associated with the authenticated user
        $deletedAlarm = SleepTrackerAlarm::where('user_id', $user->id)
            ->where('id', $id)
            ->delete();
    
        if($deletedAlarm == 0) {
            return response()->json(['message' => 'Alarm not found or not associated with the user'], 404);
        }
    
        return response()->json(['message' => 'Alarm deleted successfully']);
    }
    

    
    public function getScoreLogs(SleepTrackerScore $sleepTrackerScore){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $score = $sleepTrackerScore->get();
        return response()->json($score);
    }

    public function createScore(Request $request){
        $user = Auth::user();
        $request->validate([
            'score_logs' => 'required',
        ]);

        $score = SleepTrackerScore::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'score_log' => $request->input('score_logs'),
        ]);

        return response()->json(['message' => 'Score_logs for Sleep Tracker is created for this user', $score]);

    }
    
    
}
