<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\StepTrackerLeaderboard;
use App\Models\User;
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
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('user.user-ui.user')->with('success', 'Profile updated successfully!');
    }
    public function leaderboard(){
        $user = Auth::user();
        
        if (Auth::check()) {
            // User is authenticated
            $topUsers = StepTrackerLeaderboard::orderBy('steps', 'desc')->limit(10)->get();

            return view('user.leaderboard',compact('topUsers', 'user'));
        }else{
            
        }
    
    }
}
