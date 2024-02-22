<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StepTracker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class StepTrackerController extends Controller{

    //For Current Steps For Day
    public function indexCurrentStepsPerDay(User $user){
        $currentStepsPerDay = StepTracker::select('current_steps_per_day')->get();
    
        if ($currentStepsPerDay->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($currentStepsPerDay);
    }

    public function createCurrentStepsPerDay(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'current_steps_per_day' => 'required',
        ]);

        $currentStepsPerDay = StepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'current_steps_per_day' => $request->input('current_steps_per_day'),
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => null
        ]);

        return response()->json(['message' => 'Current Step Per Day is created for this user', $currentStepsPerDay]);

    }

    public function updateCurrentStepsPerDay(Request $request, $id){
        //$user = User::find($id);
        $currentStepsPerDay = StepTracker::findOrFail($id);
        $currentStepsPerDay->update([
            'user_id' => null,
            'current_steps_per_day' => $request->input('current_steps_per_day'),
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => null
        ]);
        return response()->json(['message' => 'Current Steps Per Day is created for this user', $currentStepsPerDay]);
    }

    public function destroyCurrentStepsPerDay($id)
    {
        StepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Current Steps Per Day deleted successfully'], 200);
    }

    //For Total Steps Taken
    public function indexTotalStepsTaken(User $user){
        $totalStepsTaken = StepTracker::select('total_steps_taken')->get();
    
        if ($totalStepsTaken->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($totalStepsTaken);
    }

    public function createTotalStepsTaken(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'total_steps_taken' => 'required',
        ]);

        $totalStepsTaken = StepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => $request->input('total_steps_taken'),
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => null
        ]);

        return response()->json(['message' => 'Total Step Taken is created for this user', $totalStepsTaken]);

    }

    public function updateTotalStepsTaken(Request $request, $id){
        //$user = User::find($id);
        $totalStepsTaken = StepTracker::findOrFail($id);
        $totalStepsTaken->update([
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => $request->input('total_steps_taken'),
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => null
        ]);
        return response()->json(['message' => 'Total Steps Taken is created for this user', $totalStepsTaken]);
    }

    public function destroyTotalStepsTaken($id)
    {
        StepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Total Steps Taken deleted successfully'], 200);
    }

    //For Average Steps Taken
    public function indexAverageStepsTaken(User $user){
        $averageStepsTaken = StepTracker::select('average_steps_taken')->get();
    
        if ($averageStepsTaken->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($averageStepsTaken);
    }

    public function createAverageStepsTaken(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'average_steps_taken' => 'required',
        ]);

        $averageStepsTaken = StepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => $request->input('average_steps_taken'),
            'daily_goal' => null,
            'monthly_goal' => null
        ]);

        return response()->json(['message' => 'Average Step Taken is created for this user', $averageStepsTaken]);

    }

    public function updateAverageStepsTaken(Request $request, $id){
        //$user = User::find($id);
        $averageStepsTaken = StepTracker::findOrFail($id);
        $averageStepsTaken->update([
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => $request->input('average_steps_taken'),
            'daily_goal' => null,
            'monthly_goal' => null
        ]);
        return response()->json(['message' => 'Average Steps Taken is created for this user', $averageStepsTaken]);
    }

    public function destroyAverageStepsTaken($id){
        StepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Average Steps Taken deleted successfully'], 200);
    }

    //For Daily Goal
    public function indexDailyGoal(User $user){
        $dailyGoal = StepTracker::select('daily_goal')->get();
    
        if ($dailyGoal->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($dailyGoal);
    }

    public function createDailyGoal(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'daily_goal' => 'required',
        ]);

        $dailyGoal = StepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => $request->input('daily_goal'),
            'monthly_goal' => null
        ]);

        return response()->json(['message' => 'Daily Goal is created for this user', $dailyGoal]);

    }

    public function updateDailyGoal(Request $request, $id){
        //$user = User::find($id);
        $dailyGoal = StepTracker::findOrFail($id);
        $dailyGoal->update([
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => $request->input('daily_goal'),
            'monthly_goal' => null
        ]);
        return response()->json(['message' => 'Daily Goal is created for this user', $dailyGoal]);
    }

    public function destroyDailyGoal($id){
        StepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Daily Goal deleted successfully'], 200);
    }

    //For Monthly Goal
    public function indexMonthlyGoal(User $user){
        $monthlyGoal = StepTracker::select('monthly_goal')->get();
    
        if ($monthlyGoal->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($monthlyGoal);
    }

    public function createMonthlyGoal(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'monthly_goal' => 'required',
        ]);

        $monthlyGoal = StepTracker::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => $request->input('monthly_goal')
        ]);

        return response()->json(['message' => 'Monthly Goal is created for this user', $monthlyGoal]);

    }

    public function updateMonthlyGoal(Request $request, $id){
        //$user = User::find($id);
        $monthlyGoal = StepTracker::findOrFail($id);
        $monthlyGoal->update([
            'user_id' => null,
            'current_steps_per_day' => null,
            'total_steps_taken' => null,
            'average_steps_taken' => null,
            'daily_goal' => null,
            'monthly_goal' => $request->input('monthly_goal')
        ]);
        return response()->json(['message' => 'Monthly is created for this user', $monthlyGoal]);
    }

    public function destroyMonthlyGoal($id){
        StepTracker::findOrFail($id)->delete();
        return response()->json(['message' => 'Monthly Goal deleted successfully'], 200);
    }
    
}


