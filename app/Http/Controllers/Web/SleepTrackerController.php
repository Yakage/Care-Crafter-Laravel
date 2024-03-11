<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SleepTrackerAlarm;
use App\Models\SleepTrackerLeaderboard;
use App\Models\SleepTrackerScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SleepTrackerController extends Controller
{
    public function getHistoryOfSleepTracker(SleepTrackerAlarm $sleepTrackerAlarm, SleepTrackerScore $sleepTrackerScore){
        $user = User::all();
        $alarms = SleepTrackerAlarm::where('user_id', auth()->id())->get();
        $scores = SleepTrackerScore::where('user_id', auth()->id())->get();


        return view('user.sleep-tracker.history', compact('alarms', 'scores'));
    }

   // For Statistics
   public function chartDataSleepsWeekly() {
        $user = Auth::user();

        // Get the current date
        $today = date('Y-m-d');

        // Calculate the start and end of the current week
        $startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($today)));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($today)));

        // Initialize an array to store water intake data for each day
        $sleepsHistoryData = [];

        // Loop through each day of the week
        $currentDate = $startOfWeek;
        while ($currentDate <= $endOfWeek) {
            // Retrieve the sum of 'Step' for the authenticated user and the current date
            $sleepsHistory = SleepTrackerLeaderboard::where('user_id', $user->id)
                ->whereDate('date', $currentDate)
                ->sum('sleeps');

            // Add water intake data for the current day to the array
            $sleepsHistoryData[] = [
                'label' => date('l', strtotime($currentDate)), // Format day name (e.g., Monday, Tuesday)
                'value' => $sleepsHistory
            ];

            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }

        // Return the water intake data array
        return response()->json($sleepsHistoryData);
    }

    public function chartDataSleepsMonthly() {
        $user = Auth::user();
        
        // Get the current date
        $today = date('Y-m-d');
        
        // Get the first day of the current month
        $firstDayOfMonth = date('Y-m-01');
        
        // Get the last day of the current month
        $lastDayOfMonth = date('Y-m-t');
        
        // Initialize an array to store water intake data for each week
        $weeklySleepsData = [];
        
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
                $sleepsForWeek = SleepTrackerLeaderboard::where('user_id', $user->id)
                    ->whereBetween('date', [$currentWeekStart, $currentWeekEnd])
                    ->sum('sleeps');
                
                // Add water intake data for the current week to the array
                $weeklySleepsData[] = [
                    'week' => 'Week ' . count($weeklySleepsData) + 1,
                    'sleeps' => $sleepsForWeek
                ];

                // Move the start date of the next week to the next day
                $currentWeekStart = date('Y-m-d', strtotime('+1 day', strtotime($currentWeekEnd)));
            }
            
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
        
        // Return the water intake data array
        return response()->json($weeklySleepsData);
    }
}
