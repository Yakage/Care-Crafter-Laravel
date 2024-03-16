<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BMI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller{
    public function getBMI(BMI $bMI){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $latestBMI = $bMI->where('user_id', $user->id)->latest()->first();
        return response()->json($latestBMI);
    }

    public function createBMI(Request $request){
        $user = Auth::user();
        $request->validate([
            'bmi' => 'required|',
            'category' => 'required',
        ]);

        $results = BMI::create([
            //'user_id' => $user->id,
            'user_id' => $user->id,
            'bmi' => $request->input('bmi'),
            'category' => $request->input('category'),
        ]);

        return response()->json(['message' => 'Calculating']);
    }
}
