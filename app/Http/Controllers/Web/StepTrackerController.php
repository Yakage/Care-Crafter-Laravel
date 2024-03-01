<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\StepTrackerLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller
{
    public function getStepHistory(StepTrackerLogs $stepTrackerLogs){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        $createdAt = $stepTrackerLogs->created_at; // Accessing the created_at timestamp
        $updatedAt = $stepTrackerLogs->updated_at; 
        return view('user.step-tracker.history', compact('user', 'stepHistory'));
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
