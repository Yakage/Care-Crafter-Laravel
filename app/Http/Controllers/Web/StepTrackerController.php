<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $stepTrackers = $user->stepTracker()->get();
        return view('user.step-tracker.index', compact('stepTrackers'));
    }

    public function create()
    {
        return view('user.step-tracker.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $stepTracker = new StepTracker($request->all());
        $user->stepTracker()->save($stepTracker);
        return redirect()->route('user.step-tracker.index');
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


