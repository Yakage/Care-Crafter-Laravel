<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller{
    public function index(){
        $user = Auth::user();
        $stepTracker = $user->stepTracker;
        return view('step-tracker.index', compact('stepTracker'));
    }

    public function create(){
        return view('step-tracker.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $stepTracker = new StepTracker($request->all());
        $user->stepTracker()->save($stepTracker);
        return redirect()->route('step-tracker.index');
    }

    public function show(StepTracker $stepTracker){
        return view('step-tracker.show', compact('stepTracker'));
    }

    public function edit(StepTracker $stepTracker){
        return view('step-tracker.edit', compact('stepTracker'));
    }

    public function update(Request $request, StepTracker $stepTracker){
        $stepTracker->update($request->all());
        return redirect()->route('step-tracker.index');
    }

    public function destroy(StepTracker $stepTracker){
        $stepTracker->delete();
        return redirect()->route('step-tracker.index');
    }
}

