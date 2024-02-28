<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userHome(){
        return view('user.home');
    }

    public function userFeedback(){
        return view('user.feedback');
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
        ]);

        $user->update($validatedData);

        return redirect()->route('user.user-ui.user')->with('success', 'Profile updated successfully!');
    }
}
