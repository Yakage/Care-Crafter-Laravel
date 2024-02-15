<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StepTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller{

    public function __construct(){
        $this->middleware('auth:api');
    }

    public function store(Request $request){
        $user = Auth::user();
        $stepTracker = $user->stepTracker()->create($request->all());
        return response()->json($stepTracker, 201);
    }

    public function show(StepTracker $stepTracker){
        $user = Auth::user();
        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        return response()->json($stepTracker);
    }

    public function update(Request $request, StepTracker $stepTracker){
        $user = Auth::user();
        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stepTracker->update($request->all());
        return response()->json($stepTracker, 200);
    }

    public function destroy(StepTracker $stepTracker){
        $user = Auth::user();
        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stepTracker->delete();
        return response()->json(null, 204);
    }
}
