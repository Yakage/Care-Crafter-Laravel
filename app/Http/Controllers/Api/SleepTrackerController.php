<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SleepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SleepTrackerController extends Controller{
    public function index(){
        $user = Auth::user();
        $sleepTracker = $user->sleepTracker;
        return response()->json($sleepTracker, 200);
    }

    public function store(Request $request){
        $user = Auth::user();
        $sleepTracker = new SleepTracker($request->all());
        $user->sleepTracker()->save($sleepTracker);
        return response()->json($sleepTracker, 201);
    }

    public function show(SleepTracker $sleepTracker){
        return response()->json($sleepTracker, 200);
    }

    public function update(Request $request, SleepTracker $sleepTracker){
        $sleepTracker->update($request->all());
        return response()->json($sleepTracker, 200);
    }

    public function destroy(SleepTracker $sleepTracker)
{
        $sleepTracker->delete();
        return response()->json(null, 204);
    }
}
