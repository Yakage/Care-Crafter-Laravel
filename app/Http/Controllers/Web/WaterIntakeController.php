<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterIntake;
use Illuminate\Support\Facades\Auth;

class WaterIntakeController extends Controller{
    public function index(){
        $user = Auth::user();
        $waterIntake = $user->waterIntake;
        return view('water-intake.index', compact('waterIntake'));
    }

    public function create(){
        return view('water-intake.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $waterIntake = new WaterIntake($request->all());
        $user->waterIntake()->save($waterIntake);
        return redirect()->route('water-intake.index');
    }

    public function show(WaterIntake $waterIntake){
        return view('water-intake.show', compact('waterIntake'));
    }

    public function edit(WaterIntake $waterIntake){
        return view('water-intake.edit', compact('waterIntake'));
    }

    public function update(Request $request, WaterIntake $waterIntake){
        $waterIntake->update($request->all());
        return redirect()->route('water-intake.index');
    }

    public function destroy(WaterIntake $waterIntake){
        $waterIntake->delete();
        return redirect()->route('water-intake.index');
    }
}
