<?php

namespace App\Http\Controllers;

use App\Models\StepTrackerLeaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function showLeaderboard(){
    // Get top users with highest steps (replace 10 with your desired limit)
    $topUsers = StepTrackerLeaderboard::orderBy('steps', 'desc')->limit(10)->get();

    return view('user/user-ui/leaderboard', compact('topUsers'));
}
}
