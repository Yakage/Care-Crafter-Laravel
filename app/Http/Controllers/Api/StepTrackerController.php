<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StepTrackerLeaderboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\StepTrackerLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StepTrackerController extends Controller{

    public function getStepHistory(StepTrackerLogs $stepTrackerLogs){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $results = $stepTrackerLogs::where('user_id', $user->id)
                                         ->latest() // Order by created_at in descending order
                                         ->first(); // Retrieve the latest record
    return response()->json($results);
    }

    public function createStepHistory(Request $request){
        $user = Auth::user();
        $request->validate([
            'daily_goal' => 'required',
            'current_steps' => 'required',
            
        ]);

        $results = StepTrackerLogs::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'daily_goal' => $request->input('daily_goal'),
            'current_steps' => $request->input('current_steps'),
        ]);

        return response()->json($results);
    }
    
    // FOR LEaderboard
    public function createSteps(Request $request){
        $user = Auth::user();
        $request->validate([
            'steps' => 'required|integer',
        ]);

        $stepTrackerLeaderBoard = new StepTrackerLeaderboard;
        $stepTrackerLeaderBoard->user_id = $user->id;
        $stepTrackerLeaderBoard->name = $user->name;
        $stepTrackerLeaderBoard->steps = $request->steps;
        $stepTrackerLeaderBoard->date = now();
        $stepTrackerLeaderBoard->save();

        return response()->json(['message' => 'Steps tracked successfully']);
    }

    public function showDailySteps(){
        $dailySteps = StepTrackerLeaderboard::select('name', DB::raw('SUM(steps) as total_steps'))
                    ->where('date', now()->format('Y-m-d'))
                    ->groupBy('name')
                    ->orderByDesc('total_steps')
                    ->get();

        return response()->json($dailySteps);
}


    public function showWeeklySteps(){
        $weeklySteps = StepTrackerLeaderboard::select('name', DB::raw('SUM(steps) as total_steps'))
                        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                        ->groupBy('name')
                        ->orderByDesc('total_steps')
                        ->get();

        return response()->json($weeklySteps);
    }

    public function showMonthlySteps(){
        $monthlySteps = StepTrackerLeaderboard::select('name', DB::raw('SUM(steps) as total_steps'))
                        ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                        ->groupBy('name')
                        ->orderByDesc('total_steps')
                        ->get();

        return response()->json($monthlySteps);
    }

    //FOR Statistics
    public function getDailySteps(Request $request){
        $user = Auth::user();
    
        $dailySteps = StepTrackerLeaderboard::select(
            DB::raw('CASE WHEN DAYOFWEEK(date) = 1 THEN 0 ELSE DAYOFWEEK(date) - 1 END as day_of_week'), // Adjust day of the week to start from Sunday (0)
            DB::raw('SUM(steps) as total_steps')
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('CASE WHEN DAYOFWEEK(date) = 1 THEN 0 ELSE DAYOFWEEK(date) - 1 END')) // Group by transformed day of the week
        ->orderByRaw('DAYOFWEEK(date) DESC') // Order by day of the week descending to get recent days first
        ->get();
    
        return response()->json($dailySteps);
    }
    
    public function getWeeklySteps(Request $request){
        $user = Auth::user();
    
        $weeklySteps = StepTrackerLeaderboard::select(
            DB::raw('DATE_ADD(date, INTERVAL -WEEKDAY(date) DAY) as week_start_date'), // Calculate the start date of the week
            DB::raw('SUM(steps) as total_steps') // Sum of steps for each week
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('DATE_ADD(date, INTERVAL -WEEKDAY(date) DAY)')) // Group by week start date
        ->orderByRaw('DATE_ADD(date, INTERVAL -WEEKDAY(date) DAY) ASC') // Order by week start date to get recent weeks first
        ->get();
    
        return response()->json($weeklySteps);
    }
    
    public function getMonthlySteps(Request $request){
        $user = Auth::user();
    
        $monthlySteps = StepTrackerLeaderboard::select(
            DB::raw('MONTH(date) as month_number'), // Get the month index
            DB::raw('SUM(steps) as total_steps') // Sum of steps for each month
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('MONTH(date)'), DB::raw('DATE_FORMAT(date, "%Y-%m-01")')) // Group by month number and month start date
        ->orderByRaw('MONTH(date) ASC') // Order by month number to get the months in chronological order
        ->get();
    
        return response()->json($monthlySteps);
    }
    
    
    
    
    

}


