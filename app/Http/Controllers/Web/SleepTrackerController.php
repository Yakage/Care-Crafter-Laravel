<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;

class SleepTrackerController extends Controller{
    public function index(){
        $user = Auth::user();
        $sleepTracker = $user->sleepTracker;
        return view('sleep-tracker.index', compact('sleepTracker'));
    }

    public function create(){
        return view('sleep-tracker.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $sleepTracker = new SleepTracker($request->all());
        $user->sleepTracker()->save($sleepTracker);
        return redirect()->route('sleep-tracker.index');
    }

    public function show(SleepTracker $sleepTracker){
        return view('sleep-tracker.show', compact('sleepTracker'));
    }

    public function edit(SleepTracker $sleepTracker){
        return view('sleep-tracker.edit', compact('sleepTracker'));
    }

    public function update(Request $request, SleepTracker $sleepTracker){
        $sleepTracker->update($request->all());
        return redirect()->route('sleep-tracker.index');
    }

    public function destroy(SleepTracker $sleepTracker){
        $sleepTracker->delete();
        return redirect()->route('sleep-tracker.index');
    }
}

