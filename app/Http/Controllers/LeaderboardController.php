<?php

namespace App\Http\Controllers;

use App\Models\SleepTrackerLeaderboard;
use App\Models\StepTrackerLeaderboard;
use App\Models\WaterIntakeLeaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function showLeaderboard(){
    // Get top users with highest steps (replace 10 with your desired limit)
    $topUsers = StepTrackerLeaderboard::orderBy('steps', 'desc')->limit(10)->get();

    return view('user/user-ui/leaderboard', compact('topUsers'));
}

    public function showSleepLeaderboard(){
        // Get top users with highest sleep scores (replace 10 with your desired limit)
        $topSleepers = SleepTrackerLeaderboard::orderBy('score', 'desc')->limit(10)->get();

        return view('user/user-ui/leaderboard', compact('topSleepers')); // Use a separate view
}

    public function showWaterLeaderboard()
    {
        // Get top users with highest water intake (replace 10 with your desired limit)
        $topWaterDrinkers = WaterIntakeLeaderboard::orderBy('water', 'desc')->limit(10)->get();

        return view('leaderboard-water', compact('topWaterDrinkers')); // Use a separate view
}
}
