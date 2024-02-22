<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\WaterIntake;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class WaterIntakeController extends Controller{

    //For Daily Goal
    public function indexDailyGoal(User $user){
        $dailyGoal = WaterIntake::select(['daily_goal'])->get();
    
        if ($dailyGoal->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($dailyGoal);
    }

    public function createDailyGoal(Request $request){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'daily_goal' => 'required',  
        ]);

        $dailyGoal = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => $request->input('daily_goal'),
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Daily Goal is created for this user', $dailyGoal]);

    }

    public function updateDailyGoal(Request $request, $id){
        //$user = User::find($id);
        $dailyGoal = WaterIntake::findOrFail($id);
        $dailyGoal->update([
            'user_id' => null,
            'daily_goal' => $request->input('daily_goal'),
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Daily Goal is created for this user', $dailyGoal]);
    }

    public function destroyDailyGoal($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Daily Goal deleted successfully'], 200);
    }

    //For Total intake
    public function indexTotalIntake(User $user){
        $totalIntake = WaterIntake::select(['total_intake'])->get();
    
        if ($totalIntake->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($totalIntake);
    }

    public function createTotalIntake(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'total_intake' => 'required',  
        ]);

        $totalIntake = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => $request->input('total_intake'), 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Total Intake is created for this user', $totalIntake]);

    }

    public function updateTotalIntake(Request $request, $id){
        //$user = User::find($id);
        $totalIntake = WaterIntake::findOrFail($id);
        $totalIntake->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => $request->input('total_intake'), 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Total Intake is created for this user', $totalIntake]);
    }

    public function destroyTotalIntake($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Total Intake deleted successfully'], 200);
    }

    //For Current intake
    public function indexCurrentIntake(User $user){
        $currentIntake = WaterIntake::select(['current_intake'])->get();
    
        if ($currentIntake->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($currentIntake);
    }

    public function createCurrentIntake(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'current_intake' => 'required',  
        ]);

        $totalIntake = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => $request->input('current_intake'), 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Current Intake is created for this user', $totalIntake]);

    }

    public function updateCurrentIntake(Request $request, $id){
        //$user = User::find($id);
        $currentIntake = WaterIntake::findOrFail($id);
        $currentIntake->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => $request->input('current_intake'), 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Current Intake is created for this user', $currentIntake]);
    }

    public function destroyCurrentIntake($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Current Intake deleted successfully'], 200);
    }

     //For Reminder
     public function indexReminder(User $user){
        $reminder = WaterIntake::select(['reminder'])->get();
    
        if ($reminder->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($reminder);
    }

    public function createReminder(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'reminder' => 'required',  
        ]);

        $reminder = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => $request->input('reminder'), 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Reminder is created for this user', $reminder]);

    }

    public function updateReminder(Request $request, $id){
        //$user = User::find($id);
        $reminder = WaterIntake::findOrFail($id);
        $reminder->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => $request->input('reminder'), 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Reminder is created for this user', $reminder]);
    }

    public function destroyReminder($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Reminder deleted successfully'], 200);
    }

    //For Reminder Interval
    public function indexReminderInterval(User $user){
        $reminderInterval = WaterIntake::select(['reminder_interval'])->get();
    
        if ($reminderInterval->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($reminderInterval);
    }

    public function createReminderInterval(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'reminder_interval' => 'required',  
        ]);

        $reminderInterval = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'reminder_interval' => $request->input('reminder_interval'),
            'today_log' => null,
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Reminder Interval is created for this user', $reminderInterval]);

    }

    public function updateReminderInterval(Request $request, $id){
        //$user = User::find($id);
        $reminderInterval = WaterIntake::findOrFail($id);
        $reminderInterval->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => $request->input('reminder_interval'),
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Reminder Interval is created for this user', $reminderInterval]);
    }

    public function destroyReminderInterval($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Reminder Interval deleted successfully'], 200);
    }

    //For Today Log
    public function indexTodayLog(User $user){
        $todayLog = WaterIntake::select(['today_log'])->get();
    
        if ($todayLog->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($todayLog);
    }

    public function createTodayLog(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'today_log' => 'required',  
        ]);

        $todayLog = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'reminder_interval' => null,
            'today_log' => $request->input('today_log'),
            'average_volume' => null,
            'average_completion' => null, 
            'drink_frequency' => null
        ]);

        return response()->json(['message' => 'Today Log is created for this user', $todayLog]);

    }

    public function updateTodayLog(Request $request, $id){
        //$user = User::find($id);
        $todayLog = WaterIntake::findOrFail($id);
        $todayLog->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => $request->input('reminder_interval'),
            'average_completion' => null, 
            'drink_frequency' => null
        ]);
        return response()->json(['message' => 'Today Log is created for this user', $todayLog]);
    }

    public function destroyTodayLog($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Today Log deleted successfully'], 200);
    }

    //For Avarage Volume, Completion, and Drink frequency
    public function indexAverageandFrequency(User $user){
        $averageandFrequency = WaterIntake::select(['average_volume', 'average_completion', 'drink_frequency'])->get();
    
        if ($averageandFrequency->isEmpty()) {
            return response()->json(['message' => 'No records found'], 200);
        }
    
        return response()->json($averageandFrequency);
    }

    public function createAverageandFrequency(Request $request, $id){
        //$user = User::find($id);
        $validatedData = $request->validate([
            'average_volume' => 'required',
            'average_completion' => 'required', 
            'drink_frequency' => 'required'
        ]);

        $averageandFrequency = WaterIntake::create([
            //'user_id' => $user->id,
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => $request->input('average_volume'),
            'average_completion' => $request->input('average_completion'), 
            'drink_frequency' => $request->input('drink_frequency')
        ]);

        return response()->json(['message' => 'Average and Frequency is created for this user', $averageandFrequency]);

    }

    public function updateAverageandFrequency(Request $request, $id){
        //$user = User::find($id);
        $averageandFrequency = WaterIntake::findOrFail($id);
        $averageandFrequency->update([
            'user_id' => null,
            'daily_goal' => null,
            'total_intake' => null, 
            'current_intake' => null, 
            'reminder' => null, 
            'today_log' => null,
            'reminder_interval' => null,
            'average_volume' => $request->input('average_volume'),
            'average_completion' => $request->input('average_completion'), 
            'drink_frequency' => $request->input('drink_frequency')
        ]);
        return response()->json(['message' => 'Average And Frequency is created for this user', $averageandFrequency]);
    }

    public function destroyAverageandFrequency($id){
        WaterIntake::findOrFail($id)->delete();
        return response()->json(['message' => 'Average and Frequency deleted successfully'], 200);
    }

}

