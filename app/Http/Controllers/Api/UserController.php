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
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'avatar' => 'required|numeric'       
         ], [
            'name.required' => 'Please enter your name',
            'birthday.required' => 'Please enter your birthday',
            'gender.required' => 'Please enter your gender',
            'gender.in' => 'Please enter a valid gender (male or female)',
            'height.required' => 'Please enter your height',
            'weight.required' => 'Please enter your weight',
        ]);

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

    

}
