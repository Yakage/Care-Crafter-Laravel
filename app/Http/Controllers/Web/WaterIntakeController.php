<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WaterIntake;
use App\Models\WaterIntakeLeaderboard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaterIntakeController extends Controller{
    public function index(){
        $user = Auth::user();
        $waterIntake = $user->waterIntake;
        return view('water-intake.index', compact('waterIntake'));
    }

    public function create(){
        return view('water-intake.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $waterIntake = new WaterIntake($request->all());
        $user->waterIntake()->save($waterIntake);
        return redirect()->route('water-intake.index');
    }

    public function show(WaterIntake $waterIntake){
        return view('water-intake.show', compact('waterIntake'));
    }

    public function edit(WaterIntake $waterIntake){
        return view('water-intake.edit', compact('waterIntake'));
    }

    public function update(Request $request, WaterIntake $waterIntake){
        $waterIntake->update($request->all());
        return redirect()->route('water-intake.index');
    }

    public function destroy(WaterIntake $waterIntake){
        $waterIntake->delete();
        return redirect()->route('water-intake.index');
    }

    // public function chartData3() {
    //     $user = Auth::user();
    
    //     // Get the current date
    //     $today = Carbon::today();
        
    //     // Retrieve the sum of 'water' for the authenticated user and today's date
    //     $waterHistory = WaterIntakeLeaderboard::where('user_id', $user->id)
    //         ->whereDate('date', $today)
    //         ->sum('water');
        
    //     $waterHistoryData = [
    //         [
    //             'label' => 'DRINKS',
    //             'value' => $waterHistory
    //         ]
    //     ];
        
    //     return response()->json([
    //         'waterHistoryData' => $waterHistoryData
    //     ]);
    // }

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
