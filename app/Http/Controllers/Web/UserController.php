<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\StepTrackerLeaderboard;
use App\Models\SleepTrackerLeaderboard;
use App\Models\SleepTrackerScore;
use App\Models\StepTrackerLogs;
use App\Models\User;
use App\Models\WaterIntakeLeaderboard;
use App\Models\WaterIntakeLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userHome(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('user.home', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
    }

    public function userAccount(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('dashboard', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
        return view('user.user-ui.user', compact('userData'));
    }
    public function userFeedback(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('user.feedback', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
    }
    public function userDashboard(Request $request)
    {
        $user = Auth::user();
        $userData = [
            'name' => $user->name,
            'birthday' => $user->birthday,
            'height' => $user->height,
            'weight' => $user->weight,
            'email' => $user->email,
            'gender' => $user->gender,
            'user_id' => $user->id,
        ];

    return view('user.user-ui.user', compact('userData'));
}
    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'password' => 'nullable|confirmed|min:8',
            
        ]);

         // Remove password fields from the validated data if they are not provided
        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('user.user-ui.user')->with('success', 'Profile updated successfully!');
    }
    public function leaderboard(){
        $user = Auth::user();
        
        if (Auth::check()) {
            // User is authenticated
            $topUsers = StepTrackerLeaderboard::orderBy('steps', 'desc')->limit(10)->get();

            $topSleepers = SleepTrackerLeaderboard::orderBy('score', 'desc')->limit(10)->get();

            $topWaterDrinkers = WaterIntakeLeaderboard::orderBy('water', 'desc')->limit(10)->get();


            return view('user.leaderboard',compact('topUsers', 'user', 'topSleepers', 'topWaterDrinkers'));
        }else{
            
        }
    
    }

    public function stepTracker(StepTrackerLogs $stepTrackerLogs){
        $user = Auth::user();
        $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        $createdAt = $stepTrackerLogs->created_at; // Accessing the created_at timestamp
        $updatedAt = $stepTrackerLogs->updated_at; 
        return view('user.step-tracker.home', compact('user', 'stepHistory'));
    }

    public function sleepsTracker(SleepTrackerScore $sleepTrackerScore){
        $user = Auth::user();
        $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        // $createdAt = $sleepTrackerScore->created_at; // Accessing the created_at timestamp
        // $updatedAt = $sleepTrackerScore->updated_at; 
        return view('user.sleep-tracker.home', compact('user'));
    }


    public function waterIntake(WaterIntakeLogs $waterIntakeLogs){
        $user = Auth::user();
        // $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        // $createdAt = $stepTrackerLogs->created_at; // Accessing the created_at timestamp
        // $updatedAt = $stepTrackerLogs->updated_at; 
        return view('user.water-intake.home', compact('user'));
    }
    
}
