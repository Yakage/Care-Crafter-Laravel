<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user is an admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Redirect to admin dashboard
            }

            // If not admin, mark the user as active
            $user->status = 'active';
            $user->save();

            return redirect()->route('user.home'); // Redirect to user dashboard
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(Request $request){
        $user = $request->user();

        // Set user status to not active
        $user->status = 'not active';
        $user->save();

        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
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

        $user = User::create($data);
        if ($user) {
            return redirect()->route('login')->with("success", "Registration Successful, Login to access the app");
        } else {
            return redirect()->back()->with("error", "Failed to register user, please try again.");
        }
    }

    public function adminHome(){
        return view('admin.home');
    }
    public function userHome(){
        return view('user.home');
    }
}
