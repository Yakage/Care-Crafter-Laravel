<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\SleepTrackerAlarm;
use App\Models\SleepTrackerLeaderboard;
use App\Models\SleepTrackerScore;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SleepTrackerController extends Controller{
    
    public function getAlarm(SleepTrackerAlarm $sleepTrackerAlarm){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $alarm = $sleepTrackerAlarm->where('user_id', $user->id)->latest()->first();
        return response()->json($alarm);
    }
    

    public function createAlarm(Request $request){
        $user = Auth::user();
        $request->validate([
            'daily_goal' => 'required',
            'time' => 'required|string',
        ]);

        $alarm = SleepTrackerAlarm::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'daily_goal' => $request->input('daily_goal'),
            'time' => $request->input('time'),
            'date' => now(),
            
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
        $score = $sleepTrackerScore->where('user_id', $user->id)->latest()->first();
        return response()->json($score);
    }
    

    public function createScore(Request $request){
        $user = Auth::user();
        $request->validate([
            'score_logs' => 'required',
            'total_time' => 'required',
        ]);

        $score = SleepTrackerScore::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'score_log' => $request->input('score_logs'),
            'total_time' => $request->input('total_time')
        ]);

        return response()->json(['message' => 'Score_logs for Sleep Tracker is created for this user', $score]);

    }
    
    public function getSleepTime() {
        $latestSleep = SleepTrackerLeaderboard::select('name', 'score', DB::raw('SUM(sleeps) as total_sleeps'))
                                                ->where('date', now()->format('Y-m-d'))
                                                ->groupBy('name', 'score')
                                                ->orderByDesc('total_sleeps')
                                                ->first();
    
        // Convert total_sleeps from seconds to hours:minutes:seconds format
        if ($latestSleep) {
            $totalSleeps = $latestSleep->total_sleeps;
            $hours = floor($totalSleeps / 3600);
            $minutes = floor(($totalSleeps % 3600) / 60);
            $seconds = $totalSleeps % 60;
            $latestSleep->total_sleeps = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        }
    
        return response()->json($latestSleep);
    }
    
    
    public function createSleeps(Request $request){
        $user = Auth::user();
        $request->validate([
            'score' => 'required',
            'sleeps' => 'required|numeric',
        ]);
    
        $sleepTrackerLeaderBoard = new SleepTrackerLeaderboard();
        $sleepTrackerLeaderBoard->user_id = $user->id;
        $sleepTrackerLeaderBoard->name = $user->name;
        $sleepTrackerLeaderBoard->score = $request->score;
        $sleepTrackerLeaderBoard->sleeps = $request->sleeps;
        $sleepTrackerLeaderBoard->date = now();
        $sleepTrackerLeaderBoard->save();
    
        return response()->json(['message' => 'Sleeps tracked successfully']);
    }
    
    public function showDailySleeps() {
        $dailySleeps = SleepTrackerLeaderboard::select('name', DB::raw('SUM(sleeps) as total_sleeps'))
                        ->where('date', now()->format('Y-m-d'))
                        ->groupBy('name')
                        ->orderByDesc('total_sleeps')
                        ->get();
    
        // Convert total_sleeps from seconds to hours:minutes:seconds format
        foreach ($dailySleeps as $sleep) {
            $totalSleeps = $sleep->total_sleeps;
            $hours = floor($totalSleeps / 3600);
            $minutes = floor(($totalSleeps % 3600) / 60);
            $seconds = $totalSleeps % 60;
            $sleep->total_sleeps = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        }
    
        return response()->json($dailySleeps);
    }
    
    
    public function showWeeklySleeps(){
        $weeklySleeps = SleepTrackerLeaderboard::select('name', DB::raw('SUM(sleeps) as total_sleeps'))
                        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                        ->groupBy('name')
                        ->orderByDesc('total_sleeps')
                        ->get();
    
        // Convert total_sleeps from seconds to hours:minutes:seconds format
        foreach ($weeklySleeps as $sleep) {
            $totalSleeps = $sleep->total_sleeps;
            $hours = floor($totalSleeps / 3600);
            $minutes = floor(($totalSleeps % 3600) / 60);
            $seconds = $totalSleeps % 60;
            $sleep->total_sleeps = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        }
        return response()->json($weeklySleeps);
    }
    
    public function showMonthlySleeps(){
        $monthlySleeps = SleepTrackerLeaderboard::select('name', DB::raw('SUM(sleeps) as total_sleeps'))
                        ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                        ->groupBy('name')
                        ->orderByDesc('total_sleeps')
                        ->get();

        // Convert total_sleeps from seconds to hours:minutes:seconds format
        foreach ($monthlySleeps as $sleep) {
            $totalSleeps = $sleep->total_sleeps;
            $hours = floor($totalSleeps / 3600);
            $minutes = floor(($totalSleeps % 3600) / 60);
            $seconds = $totalSleeps % 60;
            $sleep->total_sleeps = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        }
    
        return response()->json($monthlySleeps);
    }
    
    
    
}
