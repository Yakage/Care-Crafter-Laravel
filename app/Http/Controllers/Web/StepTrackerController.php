<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller
{
    // StepTrackerController.php

public function index()
{
    $user = Auth::user();
    $stepTrackers = $user->stepTracker()->get();
    return view('user.home', compact(['stepTrackers' => $stepTrackers]));
}


    public function create(Request $request){
        return view('user.step-tracker.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'current_steps_per_day' => 'required|numeric', // Validate the input
            'daily_goal' => 'required|numeric' // Add validation for daily goal
        ]);
    
        $user = Auth::user();
        $stepTracker = new StepTracker([
            'user_id' => auth()->id(),
            'current_steps_per_day' => $request->current_steps_per_day,
            'daily_goal' => $request->daily_goal
        ]);
        $user->stepTracker()->save($stepTracker);
    
        return redirect()->route('step-tracker.index')->with('success', 'Daily goal set successfully.');
    }

    public function show(StepTracker $stepTracker)
    {
        return view('user.step-tracker.show', compact('stepTracker'));
    }

    public function edit(StepTracker $stepTracker)
    {
        return view('user.step-tracker.edit', compact('stepTracker'));
    }

    public function update(Request $request, StepTracker $stepTracker)
    {
        $stepTracker->update($request->all());
        return redirect()->route('user.step-tracker.index');
    }

    public function destroy(StepTracker $stepTracker)
    {
        $stepTracker->delete();
        return redirect()->route('user.step-tracker.index');
    }
}


