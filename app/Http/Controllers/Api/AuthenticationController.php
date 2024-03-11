<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller{
    public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $tokenResult = $user->createToken('Personal Access Token');
        $accessToken = $tokenResult->plainTextToken;

        
        // Check if the user is an admin
        if ($user->role === 'admin') {
            return response()->json(['message' => 'Admin logged in', 'access_token' => $accessToken], 200);
        }
    
        // If not admin, mark the user as active
        $user->status = 'online';
        $user->update();
    
        return response()->json(['message' => 'User logged in', 'access_token' => $accessToken], 200);
    }
    
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }


    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255', // Limit name to 255 characters
            'email' => 'required|email|unique:users|max:255', // Limit email to 255 characters
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female', // Specify allowed gender values
            'height' => 'required|numeric|min:1|max:300', // Limit height between 1 and 300 cm
            'weight' => 'required|numeric|min:1|max:300', // Limit weight between 1 and 300 kg
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ], [
            'name.max' => 'Name must not exceed 255 characters.',
            'email.max' => 'Email must not exceed 255 characters.',
            'gender.in' => 'Gender must be either male or female.',
            'height.numeric' => 'Height must be a numeric value.',
            'height.min' => 'Height must be at least 1 cm.',
            'height.max' => 'Height cannot exceed 300 cm.',
            'weight.numeric' => 'Weight must be a numeric value.',
            'weight.min' => 'Weight must be at least 1 kg.',
            'weight.max' => 'Weight cannot exceed 300 kg.',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation do not match.',
        ]);
    
        // Parse height and weight values as floats
        $height = floatval($request->height);
        $weight = floatval($request->weight);
    
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'height' => $height,
            'weight' => $weight,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'online',
        ]);
    
        if ($user) {
            return response()->json(['message' => 'Registration Successful', 'user' => $user, 'userId' => $user->id], 201);
        } else {
            return response()->json(['message' => 'Failed to register user, please try again.'], 400);
        }
    }
    

    public function logout(Request $request){
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

   
}

