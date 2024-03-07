<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WaterIntakeLeaderboard;
use App\Models\WaterIntakeLogs;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class WaterIntakeController extends Controller{
    public function createWater(Request $request){
        $user = Auth::user();
        $request->validate([
            'water' => 'required|numeric',
        ]);
    
        $waterIntakeLeaderboard = new WaterIntakeLeaderboard();
        $waterIntakeLeaderboard->user_id = $user->id;
        $waterIntakeLeaderboard->name = $user->name;
        $waterIntakeLeaderboard->water = $request->water;
        $waterIntakeLeaderboard->date = now();
        $waterIntakeLeaderboard->save();
    
        return response()->json(['message' => 'Water intake tracked successfully']);
    }
    
    public function showDailyWater(){
        $dailyWaterIntake = WaterIntakeLeaderboard::select('name', DB::raw('SUM(water) as total_water'))
                    ->where('date', now()->format('Y-m-d'))
                    ->groupBy('name')
                    ->orderByDesc('total_water')
                    ->get();
    
        return response()->json($dailyWaterIntake);
    }
    
    public function showWeeklyWater(){
        $weeklyWaterIntake = WaterIntakeLeaderboard::select('name', DB::raw('SUM(water) as total_water'))
                        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                        ->groupBy('name')
                        ->orderByDesc('total_water')
                        ->get();
    
        return response()->json($weeklyWaterIntake);
    }
    
    public function showMonthlyWater(){
        $monthlyWaterIntake = WaterIntakeLeaderboard::select('name', DB::raw('SUM(water) as total_water'))
                        ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                        ->groupBy('name')
                        ->orderByDesc('total_water')
                        ->get();
    
        return response()->json($monthlyWaterIntake);
    }

    
    public function getWaterHistory(WaterIntakeLogs $waterIntakeLogs){
        $user = Auth::user();

        // Get the latest water intake log for the user
        $latestWaterLog = WaterIntakeLogs::where('user_id', $user->id)
                                        ->latest('created_at')
                                        ->first();

        // Get the sum of current_water for all logs
        $waterSum = WaterIntakeLogs::where('user_id', $user->id)->sum('current_water');

        return response()->json([$latestWaterLog, 'water_sum' => $waterSum]);
    }

    public function getWaterHistory2(WaterIntakeLogs $waterIntakeLogs){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $results = $waterIntakeLogs::where('user_id', $user->id)
                                    ->latest() // Order by created_at in descending order
                                    ->get(['created_at', 'daily_goal', 'current_water', 'history']) // Retrieve specified fields
                                    ->map(function($result) {
                                        return [
                                            'date' => $result->created_at->format('Y-m-d'),
                                            'daily_goal' => $result->daily_goal,
                                            'current_water' => $result->current_water,
                                            'history' => $result->history // Ensure 'history' field is included
                                        ];
                                    });
        return response()->json($results);
    
    }
    
    
    public function createWaterHistory(Request $request){
        $user = Auth::user();
        $request->validate([
            'daily_goal' => 'required',
            'current_water' => 'required',
            'history' => 'required',
        ]);

        $results = WaterIntakeLogs::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'daily_goal' => $request->input('daily_goal'),
            'current_water' => $request->input('current_water'),
            'history' => $request->input('history'),
        ]);

        return response()->json(['message' => 'Water Created successfully']);
    }

    //For statistics
    public function getDailyWater(Request $request){
        $user = Auth::user();

        $dailyWaterIntake = WaterIntakeLeaderboard::select(
            DB::raw('CASE WHEN DAYOFWEEK(date) = 1 THEN 0 ELSE DAYOFWEEK(date) - 1 END as day_of_week'), // Extract date portion
            DB::raw('SUM(water) as total_water') // Sum of water intake for each day
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('CASE WHEN DAYOFWEEK(date) = 1 THEN 0 ELSE DAYOFWEEK(date) - 1 END'))  // Group by date
        ->orderByRaw('DAYOFWEEK(date) DESC') // Order by date descending to get recent days first
        ->get();

        return response()->json($dailyWaterIntake);
    }

    // For weekly water intake statistics
    public function getWeeklyWater(Request $request){
        $user = Auth::user();

        $weeklyWaterIntake = WaterIntakeLeaderboard::select(
            DB::raw('DATE_ADD(date, INTERVAL -WEEKDAY(date) DAY) as week_start_date'), // Calculate the start date of the week
            DB::raw('SUM(water) as total_water') // Sum of water intake for each week
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('DATE_ADD(date, INTERVAL -WEEKDAY(date) DAY)')) // Group by week start date
        ->orderBy('week_start_date', 'asc') // Order by week start date to get recent weeks first
        ->get();

        return response()->json($weeklyWaterIntake);
    }

    // For monthly water intake statistics
    public function getMonthlyWater(Request $request){
        $user = Auth::user();

        $monthlyWaterIntake = WaterIntakeLeaderboard::select(
            DB::raw('YEAR(date) as year'), // Extract year portion
            DB::raw('MONTH(date) as month'), // Extract month portion
            DB::raw('SUM(water) as total_water') // Sum of water intake for each month
        )
        ->where('user_id', $user->id) // Filter by user ID
        ->groupBy(DB::raw('YEAR(date)'), DB::raw('MONTH(date)')) // Group by year and month
        ->orderBy('year', 'asc') // Order by year ascending
        ->orderBy('month', 'asc') // Then order by month ascending
        ->get();

        return response()->json($monthlyWaterIntake);
    }

}

