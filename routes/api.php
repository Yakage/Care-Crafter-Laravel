<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\BMIController;
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


// for User Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

//Private Routes URLS
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [UserController::class, 'getUserByToken']);
    Route::put('/updateUser', [UserController::class, 'updateUser']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    //For Step Tracker
    Route::get('/getStepHistory', [StepTrackerController::class, 'getStepHistory']);
    Route::get('/getStepHistory2', [StepTrackerController::class, 'getStepHistory2']);
    Route::post('/createStepHistory', [StepTrackerController::class, 'createStepHistory']);
        
        //FOr Leaderboards
    Route::post('/createStep', [StepTrackerController::class, 'createSteps']);
    Route::get('/showDailyStep', [StepTrackerController::class, 'showDailySteps']);
    Route::get('/showWeeklyStep', [StepTrackerController::class, 'showWeeklySteps']);
    Route::get('/showMonthlyStep', [StepTrackerController::class, 'showMonthlySteps']);
        //FOR Statistics
    Route::get('getDailyStep', [StepTrackerController::class, 'getDailySteps']);
    Route::get('getWeeklyStep', [StepTrackerController::class, 'getWeeklySteps']);
    Route::get('getMonthlyStep', [StepTrackerController::class, 'getMonthlySteps']);

    //For Sleep Tracker
    Route::get('/getSleepTime', [SleepTrackerController::class, 'getSleepTime']);
    Route::get('/getAlarm', [SleepTrackerController::class, 'getAlarm']);
    Route::post('/createAlarm', [SleepTrackerController::class, 'createAlarm']);
    Route::put('/updateAlarm', [SleepTrackerController::class, 'updateAlarm']);
    Route::delete('/deleteAlarm/{id}', [SleepTrackerController::class, 'deleteAlarm']);

    Route::get('/getScore', [SleepTrackerController::class, 'getScoreLogs']);
    Route::post('/createScore', [SleepTrackerController::class, 'createScore']);
        //For LeaderBoard
    Route::post('/createSleep', [SleepTrackerController::class, 'createSleeps']);
    Route::get('/showDailySleep', [SleepTrackerController::class, 'showDailySleeps']);
    Route::get('/showWeeklySleep', [SleepTrackerController::class, 'showWeeklySleeps']);
    Route::get('/showMonthlySleep', [SleepTrackerController::class, 'showMonthlySleeps']);

    //For Water 
        //For Leaderboard
    Route::post('/createWater', [WaterIntakeController::class, 'createWater']);
    Route::get('/showDailyWater', [WaterIntakeController::class, 'showDailyWater']);
    Route::get('/showWeeklyWater', [WaterIntakeController::class, 'showWeeklyWater']);
    Route::get('/showMonthlyWater', [WaterIntakeController::class, 'showMonthlyWater']);

        //FOR Statistics
    Route::get('getDailyWater', [WaterIntakeController::class, 'getDailyWater']);
    Route::get('getWeeklyWater', [WaterIntakeController::class, 'getWeeklyWater']);
    Route::get('getMonthlyWater', [WaterIntakeController::class, 'getMonthlyWater']);

    Route::get('/getWaterHistory', [WaterIntakeController::class, 'getWaterHistory']);
    Route::post('/createWaterHistory', [WaterIntakeController::class, 'createWaterHistory']);
    //For BMI
    Route::get('/getBMI', [BMIController::class, 'getBMI']);
    Route::post('/createBMI', [BMIController::class, 'createBMI']);
 
});


