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
    Route::put('/updateStepHistory', [StepTrackerController::class, 'updateStepHistory']);
        
        //FOr Leaderboards
    Route::get('/totalSteps', [StepTrackerController::class, 'totalSteps']);    
    Route::put('/updateStep', [StepTrackerController::class, 'updateSteps']);
    Route::post('/createStep', [StepTrackerController::class, 'createSteps']);
    Route::get('/showDailyStep', [StepTrackerController::class, 'showDailySteps']);
    Route::get('/showWeeklyStep', [StepTrackerController::class, 'showWeeklySteps']);
    Route::get('/showMonthlyStep', [StepTrackerController::class, 'showMonthlySteps']);
    
        //FOR Statistics
    Route::get('/chartDataStepsWeekly', [StepTrackerController::class, 'chartDataStepsWeekly']);
    Route::get('/chartDataStepsMonthly', [StepTrackerController::class, 'chartDataStepsMonthly']);

    //For Sleep Tracker
    Route::get('/getSleepHistory', [SleepTrackerController::class, 'getSleepHistory']);
    Route::get('/getSleepTime', [SleepTrackerController::class, 'getSleepTime']);
    Route::get('/getAlarm', [SleepTrackerController::class, 'getAlarm']);
    Route::post('/createAlarm', [SleepTrackerController::class, 'createAlarm']);
    Route::put('/updateAlarm', [SleepTrackerController::class, 'updateAlarm']);
    Route::delete('/deleteAlarm/{id}', [SleepTrackerController::class, 'deleteAlarm']);

    Route::get('/getScore', [SleepTrackerController::class, 'getScoreLogs']);
    Route::post('/createScore', [SleepTrackerController::class, 'createScore']);
        //For leaderbaords
    Route::get('/totalSleeps', [SleepTrackerController::class, 'totalSleeps']);  
    Route::post('/createSleep', [SleepTrackerController::class, 'createSleeps']);
    Route::get('/showDailySleep', [SleepTrackerController::class, 'showDailySleeps']);
    Route::get('/showWeeklySleep', [SleepTrackerController::class, 'showWeeklySleeps']);
    Route::get('/showMonthlySleep', [SleepTrackerController::class, 'showMonthlySleeps']);
    Route::get('/chartDataSleepsWeekly', [SleepTrackerController::class, 'chartDataSleepsWeekly']);
    Route::get('/chartDataSleepsMonthly', [SleepTrackerController::class, 'chartDataSleepsMonthly']);

    //For Water 
        //For Leaderboard
    Route::get('/totalWater', [WaterIntakeController::class, 'totalWater']);  
    Route::post('/createWater', [WaterIntakeController::class, 'createWater']);
    Route::get('/showDailyWater', [WaterIntakeController::class, 'showDailyWater']);
    Route::get('/showWeeklyWater', [WaterIntakeController::class, 'showWeeklyWater']);
    Route::get('/showMonthlyWater', [WaterIntakeController::class, 'showMonthlyWater']);

        //FOR Statistics
    Route::get('getDailyWater', [WaterIntakeController::class, 'getDailyWater']);
    Route::get('getWeeklyWater', [WaterIntakeController::class, 'getWeeklyWater']);
    Route::get('getMonthlyWater', [WaterIntakeController::class, 'getMonthlyWater']);

    Route::get('/getWaterHistory', [WaterIntakeController::class, 'getWaterHistory']);
    Route::get('/getWaterHistory2', [WaterIntakeController::class, 'getWaterHistory2']);
    Route::post('/createWaterHistory', [WaterIntakeController::class, 'createWaterHistory']);

    Route::get('/chartDataWaterWeekly', [WaterIntakeController::class, 'chartDataWaterWeekly']);
    Route::get('/chartDataWaterMonthly', [WaterIntakeController::class, 'chartDataWaterMonthly']);
    //For BMI
    Route::get('/getBMI', [BMIController::class, 'getBMI']);
    Route::post('/createBMI', [BMIController::class, 'createBMI']);
 
});


