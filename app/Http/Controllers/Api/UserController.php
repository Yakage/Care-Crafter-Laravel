<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SleepTracker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    //Getting the Users
    public function getUser(Request $request){
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

}
