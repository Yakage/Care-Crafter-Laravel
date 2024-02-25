<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
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

            // Check if the user is an admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Redirect to admin dashboard
            }
             // Check if not already active and update
        if ($user->status !== 'online') {
            $user->status = 'online';
            $user->save();
        }
                
            return redirect()->route('user.home'); // Redirect to user dashboard
        }

        return redirect()->route('login')->with("error", "Invalid Credentials");
    }

    public function logout(Request $request){
        //Auth::user();

        // Set user status to not active
    
        // $user->status = 'not active';
        // $user->update();
        
       // $request->user()->tokens()->delete();
        Auth::logout();
        return redirect('/')->with("success", "Successfully Logout");
    }

    function register(){
        return view('auth.register');
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date',
            'gender' => 'required|string',
            'height' => 'required|numeric', // Validate as numeric (including decimals)
            'weight' => 'required|numeric', // Validate as numeric (including decimals)
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ], [
            'name' => 'Please enter your name',
            'birthday' => 'Please enter your birthday',
            'gender' => 'Please enter your gender [male or female Only]',
            'height' => 'Please enter your heigh in kilograms',
            'weight' => 'Please enter your weight in kilograms',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation does not match.',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['height'] = $request->height;
        $data['weight'] = $request->weight;
        $data['password'] = Hash::make($request->password);
        $data['confirm_password'] = $request->confirm_password;
        $data['role'] = 'user';
        $data['status'] = 'online';

        User::create($data);  
        return redirect()->route('login')->with("success", "Registration Successful, Login to access the app");
       
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
        $activeUsersCount = User::where('status', 'online')->count();
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
