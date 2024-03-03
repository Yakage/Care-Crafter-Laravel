<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StepTrackerLeaderboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\StepTrackerLogs;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StepTrackerController extends Controller{

    public function getStepHistory(StepTrackerLogs $stepTrackerLogs){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $results = $stepTrackerLogs->get();
        return response()->json($results);
    }

    public function createStepHistory(Request $request){
        $user = Auth::user();
        $request->validate([
            'step_history' => 'required',
        ]);

        $results = StepTrackerLogs::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'step_history' => $request->input('step_history'),
        ]);

        return response()->json($results);
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


}


