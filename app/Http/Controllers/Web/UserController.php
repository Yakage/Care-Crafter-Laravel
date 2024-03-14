<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SleepTrackerAlarm;
use App\Models\StepTrackerLeaderboard;
use App\Models\SleepTrackerLeaderboard;
use App\Models\SleepTrackerScore;
use App\Models\StepTrackerLogs;
use App\Models\User;
use App\Models\UserFeedback;
use App\Models\WaterIntakeLeaderboard;
use App\Models\WaterIntakeLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function userHome(){
        $user = Auth::user();

        $userDailyGoal = $user->stepTrackerLog->daily_goal ?? 0;
        $totalWaterIntake = $user->waterIntakeLog->current_water ?? 0;
    
        $height = $user->height;
        $weight = $user->weight;
        $bmi = $height && $weight ? round(($weight / pow($height / 100, 2)), 2) : 'Not available';

        if ($bmi !== 'Not available') {
            if ($bmi < 18.5) {
                $bmiClassification = 'Underweight';
            } elseif ($bmi >= 18.5 && $bmi < 25) {
                $bmiClassification = 'Normal weight';
            } elseif ($bmi >= 25 && $bmi < 30) {
                $bmiClassification = 'Overweight';
            } else {
                $bmiClassification = 'Obese';
            }
        }

        // $totalSleepTime = $user->SleepTrackerLeaderboard->sleeps ??0;

        // Get the current date
        $currentDate = now()->toDateString();

        // Query the database to get the sum of sleeps for the current day and the current user
        $totalSleeps = SleepTrackerLeaderboard::where('user_id', $user->id)
            ->whereDate('date', $currentDate)
            ->sum('sleeps');

        $sleepScore = $user->sleepTrackerLeaderboard->score ?? 0;


        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated

            return view('user.home', compact('user', 'userDailyGoal', 'totalWaterIntake', 'bmi','bmiClassification', 'totalSleeps', 'sleepScore'));
        //     return view('user.home', 
        //     ['user' => $user,
        //     'userDailyGoal' => $userDailyGoal
        
        // ]);
            // return view('user.home', compact('user', 'stepGoal', 'totalWaterIntake', 'bmi', 'totalSleepTime', 'sleepScore'));
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

    return view('user.user-ui.user', compact('userData','user'));
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

    public function leaderboard() {
        $user = Auth::user();
        if (Auth::check()) {
            // User is authenticated
            //$topUsers = StepTrackerLeaderboard::orderBy('steps', 'desc')->limit(10)->get();
            $topUsers = StepTrackerLeaderboard::select('user_id', 'name', DB::raw('SUM(steps) AS total_steps'))
            ->groupBy('user_id', 'name')
            ->orderByDesc('total_steps')
            ->limit(10)
            ->get();

            //$topSleepers = SleepTrackerLeaderboard::orderBy('score', 'desc')->limit(10)->get();
            $topSleepers = SleepTrackerLeaderboard::select('user_id', 'name', DB::raw('SUM(sleeps) AS total_sleeps'))
            ->groupBy('user_id', 'name')
            ->orderByDesc('total_sleeps')
            ->limit(10)
            ->get();

            //$topWaterDrinkers = WaterIntakeLeaderboard::orderBy('water', 'desc')->limit(10)->get();
            $topWaterDrinkers = WaterIntakeLeaderboard::select('user_id', 'name', DB::raw('SUM(water) AS total_water'))
            ->groupBy('user_id', 'name')
            ->orderByDesc('total_water')
            ->limit(10)
            ->get();

            return view('user.leaderboard', compact('topUsers', 'user', 'topSleepers', 'topWaterDrinkers'));
        } else {
            // Handle unauthenticated user case if needed
        }
    }


    public function stepTracker(StepTrackerLogs $stepTrackerLogs)
    {
        $user = Auth::user();
        $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        $createdAt = $stepTrackerLogs->created_at; // Accessing the created_at timestamp
        $updatedAt = $stepTrackerLogs->updated_at;

        return view('user.step-tracker.home', compact('user', 'stepHistory'));
    }

    public function sleepsTracker(){
        $user = Auth::user();
        $scores = SleepTrackerLeaderboard::where('user_id', auth()->id())->get();
        return view('user.sleep-tracker.home', compact('user', 'scores'));
    }


    public function waterIntake(WaterIntakeLogs $waterIntakeLogs){
        $user = Auth::user();
        // $stepHistory = StepTrackerLogs::where('user_id', auth()->id())->get();

        // $createdAt = $stepTrackerLogs->created_at; // Accessing the created_at timestamp
        // $updatedAt = $stepTrackerLogs->updated_at; 
        return view('user.water-intake.home', compact('user'));
    }

    public function showStatistics()
{
    $user = Auth::user();
    
    $stepGoal = $user->stepTrackerLog->daily_goal ?? 'Not set';
    $totalWaterIntake = $user->waterIntakeLog->current_water ?? 'Not available';
    
    $height = $user->height;
    $weight = $user->weight;
    $bmi = $height && $weight ? round(($weight / pow($height / 100, 2)), 2) : 'Not available';
    
    $totalSleepTime = $user->sleepTrackerScore->total_time ?? 'Not available';
    $sleepScore = $user->sleepTrackerScore->score_logs ?? 'Not available';
    
    return view('statistics', compact('user', 'stepGoal', 'totalWaterIntake', 'bmi', 'totalSleepTime', 'sleepScore'));
}
    
}
