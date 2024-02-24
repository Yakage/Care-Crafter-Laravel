<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user is an admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Redirect to admin dashboard
            }
             // Check if not already active and update
        if ($user->status !== 'active') {
            $user->status = 'active';
            $user->save();
        }
                
            return redirect()->route('user.home'); // Redirect to user dashboard
        }

        return redirect()->route('login')->with("error", "Invalid Credentials");
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(Request $request){
        $user = Auth::user();

        // Set user status to not active
    
        // $user->status = 'not active';
        // $user->update();
        
       // $request->user()->tokens()->delete();
        Auth::logout();
        return redirect()->route('login')->with("success", "Successfully Logout");
    }

    function register(){
        return view('auth.register');
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
            'height' => 'required|numeric', // Validate as numeric (including decimals)
            'weight' => 'required|numeric', // Validate as numeric (including decimals)
            'gender' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ], [
            'name' => 'Please enter your name',
            'age' => 'Please enter your age',
            'height' => 'Please enter your heigh in kilograms',
            'weight' => 'Please enter your weight in kilograms',
            'gender' => 'Please enter your gender [male or female Only]',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation does not match.',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['age'] = $request->age;
        $data['height'] = $request->height;
        $data['weight'] = $request->weight;
        $data['gender'] = $request->gender;
        $data['password'] = Hash::make($request->password);
        $data['confirm_password'] = $request->confirm_password;
        $data['role'] = 'user';
        $data['status'] = 'active';

        $user = User::create($data);
        if ($user) {
            return redirect()->route('login')->with("success", "Registration Successful, Login to access the app");
        } else {
            return redirect()->back()->with("error", "Failed to register user, please try again.");
        }
    }

    public function adminHome(){
//counts users in the database
        $userCount = User::count();
// Count users by gender
        $userCountsByGender = User::selectRaw('gender, count(*) as user_count')
        ->groupBy('gender')
        ->get()
        ->pluck('user_count', 'gender');
// active user count
        $activeUsersCount = User::where('status', 'active')->count();
//returns view
        return view('admin.home', [
            'userCount' => $userCount,
            'userCountsByGender' => $userCountsByGender,
            'activeUsersCount' => $activeUsersCount]);
        
    }
    public function userHome(){
        $users = User::get();
        return view('user.home', compact('users'));
    }
}
