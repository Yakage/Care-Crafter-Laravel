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
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
            'height' => 'required|numeric', // Allow decimal values
            'weight' => 'required|numeric', // Allow decimal values
            'gender' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);

        // Parse height and weight values as floats
        $height = floatval($request->height);
        $weight = floatval($request->weight);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);

        if ($user) {
            return response()->json(['message' => 'User registered successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
}
