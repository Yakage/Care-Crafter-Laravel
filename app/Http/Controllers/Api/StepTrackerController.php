<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\StepTrackerLogs;
use App\Models\User;

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
    
}


