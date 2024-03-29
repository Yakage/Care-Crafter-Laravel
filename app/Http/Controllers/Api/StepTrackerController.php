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

    public function getStepHistory2(StepTrackerLogs $stepTrackerLogs) {
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $results = $stepTrackerLogs::where('user_id', $user->id)
                                    ->latest() // Order by created_at in descending order
                                    ->get(['created_at', 'daily_goal', 'current_steps']) // Retrieve specified fields
                                    ->map(function($result) {
                                        return [
                                            'date' => $result->created_at->format('Y-m-d'),
                                            'daily_goal' => $result->daily_goal,
                                            'current_steps' => $result->current_steps
                                        ];
                                    });
    
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

        return response()->json(['message' => 'Steps tracked successfully']);
    }

    public function updateStepHistory(Request $request){
        $user = Auth::user();
        $request->validate([
            'current_steps' => 'required|numeric',
        ]);
    
        // Check if there's an existing record for the current user and date
        $existingRecord = StepTrackerLogs::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->first();
    
        if ($existingRecord) {
            // Update existing record
            $existingRecord->current_steps = $request->current_steps;
            $existingRecord->save();
            return response()->json(['message' => 'Steps tracked successfully']);
        }else{
            return response()->json(['message' => 'No Step data for this day']);
        }
    }
    
    // FOR LEaderboard
    public function updateSteps(Request $request){
        $user = Auth::user();
        $request->validate([
            'steps' => 'required|numeric',
        ]);
    
        // Check if there's an existing record for the current user and date
        $existingRecord = StepTrackerLeaderboard::where('user_id', $user->id)
            ->whereDate('date', now()->toDateString())
            ->first();
    
        if ($existingRecord) {
            // Update existing record
            $existingRecord->steps = $request->steps;
            $existingRecord->save();
            return response()->json(['message' => 'Steps tracked updated successfully']);
        }else{
            return response()->json(['message' => 'No Step data for this day']);
        }
    }
    
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
        $stepTrackerLeaderBoard->avatar = $user->avatar;
        $stepTrackerLeaderBoard->save();

        return response()->json(['message' => 'Steps tracked successfully']);
        
    }

    public function totalSteps() {
        $user = Auth::user();
    
        // Sum the steps for the authenticated user
        $totalSteps = StepTrackerLeaderboard::where('user_id', $user->id)
            ->sum('steps');
    
        return response()->json(['total_steps' => $totalSteps]);
    }
    
    

    public function showDailySteps(){
        $dailySteps = StepTrackerLeaderboard::select('name', DB::raw('MAX(avatar) as latest_avatar'), DB::raw('SUM(steps) as total_steps'))
                    ->where('date', now()->format('Y-m-d'))
                    ->groupBy('name')
                    ->orderByDesc('total_steps')
                    ->get();
    
        return response()->json($dailySteps);
    }


    public function showWeeklySteps(){
        $weeklySteps = StepTrackerLeaderboard::select('name', DB::raw('MAX(avatar) as latest_avatar'), DB::raw('SUM(steps) as total_steps'))
                        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                        ->groupBy('name')
                        ->orderByDesc('total_steps')
                        ->get();
        return response()->json($weeklySteps);
    }

    public function showMonthlySteps(){
        $monthlySteps = StepTrackerLeaderboard::select('name', DB::raw('MAX(avatar) as latest_avatar'), DB::raw('SUM(steps) as total_steps'))
                        ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                        ->groupBy('name')
                        ->orderByDesc('total_steps')
                        ->get();

        return response()->json($monthlySteps);
    }

    // For Statistics
    public function chartDataStepsWeekly() {
        $user = Auth::user();
    
        // Get the current date
        $today = date('Y-m-d');
    
        // Calculate the start and end of the current week
        $startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($today)));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($today)));
    
        // Initialize an array to store water intake data for each day
        $stepHistoryData = [];
    
        // Loop through each day of the week
        $currentDate = $startOfWeek;
        while ($currentDate <= $endOfWeek) {
            // Retrieve the sum of 'Step' for the authenticated user and the current date
            $stepHistory = StepTrackerLeaderboard::where('user_id', $user->id)
                ->whereDate('date', $currentDate)
                ->sum('steps');
    
            // Add water intake data for the current day to the array
            $stepHistoryData[] = [
                'label' => date('l', strtotime($currentDate)), // Format day name (e.g., Monday, Tuesday)
                'value' => $stepHistory
            ];
    
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
    
        // Return the water intake data array
        return response()->json($stepHistoryData);
    }

    public function chartDataStepsMonthly() {
        $user = Auth::user();
        
        // Get the current date
        $today = date('Y-m-d');
        
        // Get the first day of the current month
        $firstDayOfMonth = date('Y-m-01');
        
        // Get the last day of the current month
        $lastDayOfMonth = date('Y-m-t');
        
        // Initialize an array to store water intake data for each week
        $weeklyStepsData = [];
        
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
                $stepsForWeek = StepTrackerLeaderboard::where('user_id', $user->id)
                    ->whereBetween('date', [$currentWeekStart, $currentWeekEnd])
                    ->sum('steps');
                
                // Add water intake data for the current week to the array
                $weeklyStepsData[] = [
                    'week' => 'Week ' . count($weeklyStepsData) + 1,
                    'steps' => $stepsForWeek
                ];
    
                // Move the start date of the next week to the next day
                $currentWeekStart = date('Y-m-d', strtotime('+1 day', strtotime($currentWeekEnd)));
            }
            
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
        
        // Return the water intake data array
        return response()->json($weeklyStepsData);
    }
}


