<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\SleepTrackerController;
use App\Http\Controllers\Api\StepTrackerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WaterIntakeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// for User Informations
Route::get('/users', [UserController::class, 'getUser']);

// for User Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);


// Step Tracker CRUD API
Route::middleware('auth:api')->group(function () {
    Route::get('step-tracker', [StepTrackerController::class, 'index']);
    Route::post('step-tracker', [StepTrackerController::class, 'store']);
    Route::get('step-tracker/{stepTracker}', [StepTrackerController::class, 'show']);
    Route::put('step-tracker/{stepTracker}', [StepTrackerController::class, 'update']);
    Route::delete('step-tracker/{stepTracker}', [StepTrackerController::class, 'destroy']);
});


//For Sleep Tracker
Route::get('/sleep', [SleepTrackerController::class, 'indexWakeandSleepTime']);
Route::post('/sleep', [SleepTrackerController::class, 'createWakeandSleepTime']);
Route::put('/sleep/{id}', [SleepTrackerController::class, 'updateWakeandSleepTime']);

Route::middleware('auth:api')->group(function () {
    Route::get('sleep-tracker', [SleepTrackerController::class, 'index']);
    Route::post('sleep-tracker', [SleepTrackerController::class, 'store']);
    Route::get('sleep-tracker/{sleepTracker}', [SleepTrackerController::class, 'show']);
    Route::put('sleep-tracker/{sleepTracker}', [SleepTrackerController::class, 'update']);
    Route::delete('sleep-tracker/{sleepTracker}', [SleepTrackerController::class, 'destroy']);
});

//For Water Intake
Route::middleware('auth:api')->group(function () {
    Route::get('water-intake', [WaterIntakeController::class,'index']);
    Route::post('water-intake', [WaterIntakeController::class,'store']);
    Route::get('water-intake/{waterIntake}', [WaterIntakeController::class,'show']);
    Route::put('water-intake/{waterIntake}', [WaterIntakeController::class,'update']);
    Route::delete('water-intake/{waterIntake}', [WaterIntakeController::class,'destroy']);
});

