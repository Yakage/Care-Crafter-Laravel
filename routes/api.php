<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\BMIController;
use App\Http\Controllers\Api\SleepTrackerController;
use App\Http\Controllers\Api\StepTrackerController;
use App\Http\Controllers\Api\UserController;
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
    Route::post('/createStepHistory', [StepTrackerController::class, 'createStepHistory']);


    //For Sleep Tracker
    Route::get('/getAlarm', [SleepTrackerController::class, 'getAlarm']);
    Route::post('/createAlarm', [SleepTrackerController::class, 'createAlarm']);
    Route::put('/updateAlarm', [SleepTrackerController::class, 'updateAlarm']);
    Route::delete('/deleteAlarm/{id}', [SleepTrackerController::class, 'deleteAlarm']);

    Route::get('/getScore', [SleepTrackerController::class, 'getScore']);
    Route::post('/createScore', [SleepTrackerController::class, 'createScore']);

    //For Water Intake
    //For BMI
    Route::get('/getBMI', [BMIController::class, 'getBMI']);
    Route::post('/createBMI', [BMIController::class, 'createBMI']);
 
});


