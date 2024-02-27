<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userHome(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('user.home', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
    }

    public function userAccount(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('dashboard', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
        return view('user.user-ui.user', compact('userData'));
    }
    public function userFeedback(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            // User is authenticated
            return view('user.feedback', ['user' => $user]);
        } else {
            // User is not authenticated
            return redirect('/login');
        }
    }
}
