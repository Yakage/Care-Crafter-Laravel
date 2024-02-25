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
        $user->status = 'online';
        $user->update();
    
        return response()->json(['message' => 'User logged in', 'access_token' => $accessToken], 200);
    }
    
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }


    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date',
            'gender' => 'required|string',
            'height' => 'required|numeric', // Allow decimal values
            'weight' => 'required|numeric', // Allow decimal values
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
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
            'status' => 'active',
        ], [
            'name' => 'Please enter your name',
            'email' => 'Please enter your email',
            'birthday' => 'Please enter your birthday',
            'gender' => 'Please enter your gender [male or female Only]',
            'height' => 'Please enter your heigh in millimeters',
            'weight' => 'Please enter your weight in kilograms',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation does not match.',
        ]);

        if ($user) {
            return response()->json(['message' => 'Registration Successful', 'user' => $user, 'userId' => $user->id], 201);
        } else {
            return response()->json(['message' => 'Failed to register user, please try again.'], 400);
        }
    }

    public function updateUser(Request $request){

        $user = Auth::user();
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'birthday' => 'required|date',
            'gender' => 'required|string|in:male,female',

            'height' => 'required|numeric',
            'weight' => 'required|numeric',       
         ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'birthday.required' => 'Please enter your birthday',
            'gender.required' => 'Please enter your gender',
            'gender.in' => 'Please enter a valid gender (male or female)',
            'height.required' => 'Please enter your height',
            'weight.required' => 'Please enter your weight',
        ]);


        // Find the user by ID
        //$user = User::find($id);

        // Check if user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update user data
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->age = $request->input('age');
        // $user->height = $request->input('height');
        // $user->weight = $request->input('weight');
        // $user->gender = $request->input('gender');

        // // Save the updated user
        // $user->save();
        $user->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    public function logout(Request $request){
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function adminHomeApi()
    {
        return $this->respondWithUserData();
    }
//returning user and individual gender count to the view
    private function respondWithUserData()
    {
        $userCount = User::count(); //counts users

        $userCountsByGender = User::selectRaw('gender, count(*) as user_count') //counts users by gender
            ->groupBy('gender')
            ->get()
            ->pluck('user_count', 'gender');

        $activeUsersCount = User::where('status', 'active')->count();  // counts all active users
        $data = [
            'userCount' => $userCount,
            'userCountsByGender' => $userCountsByGender,
            'activeUsersCount' => $activeUsersCount,
        ];

        return response()->json($data);
    }
}

