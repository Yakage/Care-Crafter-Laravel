<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BMI;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller{
    public function getBMI(BMI $bMI){
        $user = User::all();
        $results = BMI::where('user_id', auth()->id())->get();
        return view('user.bmi.bmi', compact('user', 'results'));
    }

    public function createBMI(Request $request){
        $user = Auth::user();
        $request->validate([
            'results' => 'required',
        ]);

        $results = BMI::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'results' => $request->input('results'),
        ]);

        return response()->json($results);
    }
}
