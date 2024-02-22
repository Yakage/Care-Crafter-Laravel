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
            return response()->json(['message' => 'Admin logged in', 'userId' => $user->id, 'access_token' => $accessToken], 200);
        }
    
        // If not admin, mark the user as active
        $user->status = 'active';
        $user->save();
    
        return response()->json(['message' => 'User logged in', 'userId' => $user->id, 'access_token' => $accessToken], 200);
    }
    
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }


    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'age' => 'required|numeric',
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
        ], [
            'name' => 'Please enter your name',
            'email' => 'Please enter your email',
            'age' => 'Please enter your age',
            'height' => 'Please enter your heigh in millimeters',
            'weight' => 'Please enter your weight in kilograms',
            'gender' => 'Please enter your gender [male or female Only]',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation does not match.',
        ]);

        if ($user) {
            return response()->json(['message' => 'Registration Successful', 'user' => $user, 'userId' => $user->id], 201);
        } else {
            return response()->json(['message' => 'Failed to register user, please try again.'], 400);
        }
    }

    public function updateUser(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'age' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|string|in:male,female',
        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'age.required' => 'Please enter your age',
            'height.required' => 'Please enter your height',
            'weight.required' => 'Please enter your weight',
            'gender.required' => 'Please enter your gender',
            'gender.in' => 'Please enter a valid gender (male or female)',
        ]);


        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->height = $request->input('height');
        $user->weight = $request->input('weight');
        $user->gender = $request->input('gender');

        // Save the updated user
        $user->save();

        // Return a success response
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function adminHomeApi()
    {
        return $this->respondWithUserData();
    }

    private function respondWithUserData()
    {
        $userCount = User::count();
        $userCountsByGender = User::selectRaw('gender, count(*) as user_count')
            ->groupBy('gender')
            ->get()
            ->pluck('user_count', 'gender');

        $data = [
            'userCount' => $userCount,
            'userCountsByGender' => $userCountsByGender,
        ];

        return response()->json($data);
    }
}

