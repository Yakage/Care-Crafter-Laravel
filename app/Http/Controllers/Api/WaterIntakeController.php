<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WaterIntakeLeaderboard;
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
    

}

