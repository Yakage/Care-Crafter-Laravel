<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\WaterIntake;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WaterIntakeController extends Controller{
    public function index(){
        $user = Auth::user();
        $waterIntake = $user->waterIntake;
        return response()->json($waterIntake, 200);
    }

    public function store(Request $request){
        $user = Auth::user();
        $waterIntake = new WaterIntake($request->all());
        $user->waterIntake()->save($waterIntake);
        return response()->json($waterIntake, 201);
    }

    public function show(WaterIntake $waterIntake){
        return response()->json($waterIntake, 200);
    }

    public function update(Request $request, WaterIntake $waterIntake){
        $waterIntake->update($request->all());
        return response()->json($waterIntake, 200);
    }

    public function destroy(WaterIntake $waterIntake){
        $waterIntake->delete();
        return response()->json(null, 204);
    }
}

