<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
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

            $totalSleepTime = $user->sleepTracker->time_slept ??0;
            $sleepScore = $user->sleepTracker->sleep_score ?? 0;

            // Check if the user status is not already set to 'online'
            if ($user->status !== 'online') {
                $user->status = 'online';
                $user->save(); // Use save() instead of update() to trigger model events
            }

            UserLogin::create([
                'user_id' => $user->id,
                'login_at' => now(),
            ]);

            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Redirect to admin dashboard
            } else {
                return view('user.home', compact('user','userDailyGoal','totalWaterIntake', 'bmi','bmiClassification','totalSleepTime', 'sleepScore')); // Pass user object to user dashboard view
            }
        }

        return redirect()->route('login')->with("error", "Invalid Credentials");
    }


    public function logout(Request $request)
    {
        // Check if a user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Update the user status to 'offline'
            $user->status = 'offline';
            $user->save();

            Auth::logout();
            return redirect('/')->with("success", "Successfully Logged Out");
        } else {
            // User is not authenticated
            return redirect('/login');
        }
    }


    function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            // Validation rules here...
        ], [
            // Custom error messages here...
        ]);
    
        // Validation passed, create a new user
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        // Other user data...
    
        $user = User::create($data);  
    
        if ($user) {
            return redirect()->route('login')->with("success", "Registration Successful, Login to access the app");
        } else {
            // Registration failed, return back to the registration form with an error message
            return back()->withInput()->with("error", "Registration Failed. Please try again.");
        }
    }
    

    
    public function userHome(){
        $users = User::get();
        return view('user.home', compact('users'));
    }
}
