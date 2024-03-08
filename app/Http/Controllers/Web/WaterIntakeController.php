<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WaterIntake;
use App\Models\WaterIntakeLeaderboard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

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

    public function chartData3() {
        $user = Auth::user();
    
        // Get the current date
        $today = Carbon::today();
        
        // Retrieve the sum of 'water' for the authenticated user and today's date
        $waterHistory = WaterIntakeLeaderboard::where('user_id', $user->id)
            ->whereDate('date', $today)
            ->sum('water');
        
        $waterHistoryData = [
            [
                'label' => 'DRINKS',
                'value' => $waterHistory
            ]
        ];
        
        return response()->json([
            'waterHistoryData' => $waterHistoryData
        ]);
    }

}
