<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BMI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller{
    public function getBMI(BMI $bMI){
        $user = Auth::user(); // Retrieve authenticated user based on the token
        $results = $bMI->get();
        return response()->json($results);
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
