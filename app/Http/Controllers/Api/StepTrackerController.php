<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class StepTrackerController extends Controller{
    public function index(){
        $user = Auth::user();
        $stepTracker = $user->stepTracker->get();
        return response()->json($stepTracker, 200);
    }

    public function store(Request $request){
        $user = Auth::user();
        $stepTracker = new StepTracker($request->current());
        $user->stepTracker()->save($stepTracker);
        return response()->json($stepTracker, 201);
    }

    public function show(StepTracker $stepTracker){
        return response()->json($stepTracker, 200);
    }

    public function update(Request $request, StepTracker $stepTracker){
        $stepTracker->update($request->all());
        return response()->json($stepTracker, 200);
    }

    public function destroy(StepTracker $stepTracker){
        $stepTracker->delete();
        return response()->json(null, 204);
    }
}


