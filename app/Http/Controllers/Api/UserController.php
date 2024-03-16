<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SleepTracker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    //Getting the all Users
    // public function getUser(Request $request){
    //     $users = User::all();
    //     return response()->json(['users' => $users], 200);
    // }

    public function getUserByToken(){
        $user = Auth::user(); // Retrieve authenticated user based on the token

        return response()->json($user); // Return user data as JSON
    }
    public function updateUser(Request $request){

        $user = Auth::user();
    
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Limit name to 255 characters
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female', // Specify allowed gender values
            'height' => 'required|numeric|min:1|max:300', // Limit height between 1 and 300 cm
            'weight' => 'required|numeric|min:1|max:300', // Limit weight between 1 and 300 kg
        ], [
            'name.max' => 'Name must not exceed 255 characters.',
            'gender.in' => 'Gender must be either male or female.',
            'height.numeric' => 'Height must be a numeric value.',
            'height.min' => 'Height must be at least 1 cm.',
            'height.max' => 'Height cannot exceed 300 cm.',
            'weight.numeric' => 'Weight must be a numeric value.',
            'weight.min' => 'Weight must be at least 1 kg.',
            'weight.max' => 'Weight cannot exceed 300 kg.',
        ]);
    
        // Update user data
        try {
            $user->update($validatedData);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update user.'], 500);
        }
    
        // Return updated user data
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }
}
