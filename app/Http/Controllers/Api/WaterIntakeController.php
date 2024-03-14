<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WaterIntakeLeaderboard;
use App\Models\WaterIntakeLogs;
use Carbon\Carbon;
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
        $waterIntakeLeaderboard->avatar = $user->avatar;
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
        // Get the current date in the 'Y-m-d' format
        $currentDate = date('Y-m-d');

        // Get the total sum of water intake for the current day
        $waterSum = WaterIntakeLogs::where('user_id', $user->id)
            ->whereDate('created_at', $currentDate)
            ->sum('current_water');


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

    public function totalWater() {
        $user = Auth::user();
    
        // Sum the steps for the authenticated user
        $totalWater = WaterIntakeLeaderboard::where('user_id', $user->id)
            ->sum('water');
    
        return response()->json(['total_water' => $totalWater]);
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

    public function chartDataWaterWeekly() {
        $user = Auth::user();
    
        // Get the current date
        $today = date('Y-m-d');
    
        // Calculate the start and end of the current week
        $startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($today)));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($today)));
    
        // Initialize an array to store water intake data for each day
        $waterHistoryData = [];
    
        // Loop through each day of the week
        $currentDate = $startOfWeek;
        while ($currentDate <= $endOfWeek) {
            // Retrieve the sum of 'water' for the authenticated user and the current date
            $waterHistory = WaterIntakeLeaderboard::where('user_id', $user->id)
                ->whereDate('date', $currentDate)
                ->sum('water');
    
            // Add water intake data for the current day to the array
            $waterHistoryData[] = [
                'label' => date('l', strtotime($currentDate)), // Format day name (e.g., Monday, Tuesday)
                'value' => $waterHistory
            ];
    
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
    
        // Return the water intake data array
        return response()->json($waterHistoryData);
    }

    public function chartDataWaterMonthly() {
        $user = Auth::user();
        
        // Get the current date
        $today = date('Y-m-d');
        
        // Get the first day of the current month
        $firstDayOfMonth = date('Y-m-01');
        
        // Get the last day of the current month
        $lastDayOfMonth = date('Y-m-t');
        
        // Initialize an array to store water intake data for each week
        $weeklyWaterData = [];
        
        // Get the start date of the current week
        $currentDate = $firstDayOfMonth;
        $currentWeekStart = date('Y-m-d', strtotime('monday this week', strtotime($currentDate)));
        
        // Loop through each day of the month
        while ($currentDate <= $lastDayOfMonth) {
            // If the current date is a Monday or the last day of the month, calculate the total water intake for the current week
            if (date('N', strtotime($currentDate)) == 1 || $currentDate == $lastDayOfMonth) {
                // Get the end date of the current week (Sunday)
                $currentWeekEnd = date('Y-m-d', strtotime('sunday this week', strtotime($currentDate)));
                
                // Retrieve the sum of 'water' for the authenticated user within the current week
                $waterForWeek = WaterIntakeLeaderboard::where('user_id', $user->id)
                    ->whereBetween('date', [$currentWeekStart, $currentWeekEnd])
                    ->sum('water');
                
                // Add water intake data for the current week to the array
                $weeklyWaterData[] = [
                    'week' => 'Week ' . count($weeklyWaterData) + 1,
                    'water' => $waterForWeek
                ];
    
                // Move the start date of the next week to the next day
                $currentWeekStart = date('Y-m-d', strtotime('+1 day', strtotime($currentWeekEnd)));
            }
            
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
        
        // Return the water intake data array
        return response()->json($weeklyWaterData);
    }
    
    
    
    
    

}

