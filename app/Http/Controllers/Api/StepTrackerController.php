<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StepTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepTrackerController extends Controller{
    // Store a new step tracker record
    public function store(Request $request){
        //$request->validate([
            // Define your validation rules here
        //]);

        $user = Auth::user();
        $stepTracker = $user->stepTracker()->create($request->all());

        return response()->json($stepTracker, 201);
    }

    // Retrieve a specific step tracker record
    public function show(StepTracker $stepTracker){
        $user = Auth::user();

        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($stepTracker);
    }

    // Update an existing step tracker record
    public function update(Request $request, StepTracker $stepTracker){
        //$request->validate([
            // Define your validation rules here
        //]);

        $user = Auth::user();

        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stepTracker->update($request->all());

        return response()->json($stepTracker, 200);
    }

    // Delete a step tracker record
    public function destroy(StepTracker $stepTracker){
        $user = Auth::user();

        if ($user->id !== $stepTracker->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stepTracker->delete();

        return response()->json(null, 204);
    }
}

