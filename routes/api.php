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


// for User Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

//Private Routes URLS
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [UserController::class, 'getUser']);
    Route::put('/updateUser/{id}', [AuthenticationController::class, 'updateUser']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Step Tracker CRUD API
    //For Step Tracker
    Route::get('/step-tracker/current-steps-per-day', [StepTrackerController::class, 'indexCurrentStepsPerDay']);
    Route::post('/step-tracker/current-steps-per-day/{id}', [StepTrackerController::class, 'createCurrentStepsPerDay']);
    Route::put('/step-tracker/current-steps-per-day/{id}', [StepTrackerController::class, 'updateCurrentStepsPerDay']);
    Route::delete('/step-tracker/current-steps-per-day/{id}', [StepTrackerController::class, 'destroyCurrentStepsPerDay']);

    Route::get('/step-tracker/total-steps-taken', [StepTrackerController::class, 'indexTotalStepsTaken']);
    Route::post('/step-tracker/total-steps-taken', [StepTrackerController::class, 'createTotalStepsTaken']);
    Route::put('/step-tracker/total-steps-taken/{id}', [StepTrackerController::class, 'updateTotalStepsTaken']);
    Route::delete('/step-tracker/total-steps-taken/{id}', [StepTrackerController::class, 'destroyTotalStepsTaken']);

    Route::get('/step-tracker/average-steps-taken', [StepTrackerController::class, 'indexAverageStepsTaken']);
    Route::post('/step-tracker/average-steps-taken', [StepTrackerController::class, 'createAverageStepsTaken']);
    Route::put('/step-tracker/average-steps-taken/{id}', [StepTrackerController::class, 'updateAverageStepsTaken']);
    Route::delete('/step-tracker/average-steps-taken/{id}', [StepTrackerController::class, 'destroyAverageStepsTaken']);

    Route::get('step-tracker/daily-goal', [StepTrackerController::class, 'indexDailyGoal']);
    Route::post('/step-tracker/daily-goal', [StepTrackerController::class, 'createDailyGoal']);
    Route::put('/step-tracker/daily-goal/{id}', [StepTrackerController::class, 'updateDailyGoal']);
    Route::delete('/step-tracker/daily-goal/{id}', [StepTrackerController::class, 'destroyDailyGoal']);

    Route::get('/step-tracker/monthly-goal', [StepTrackerController::class, 'indexMonthlyGoal']);
    Route::post('/step-tracker/monthly-goal', [StepTrackerController::class, 'createMonthlyGoal']);
    Route::put('/step-tracker/monthly-goal/{id}', [StepTrackerController::class, 'updateMonthlyGoal']);
    Route::delete('/step-tracker/monthly-goal/{id}', [StepTrackerController::class, 'destroyMonthlyGoal']);

    //For Sleep Tracker
    Route::get('/sleep-tracker/wake-sleep-time', [SleepTrackerController::class, 'indexWakeandSleepTime']);
    Route::post('/sleep-tracker/wake-sleep-time', [SleepTrackerController::class, 'createWakeandSleepTime']);
    Route::put('/sleep-tracker/wake-sleep-time/{id}', [SleepTrackerController::class, 'updateWakeandSleepTime']);

    Route::get('/sleep-tracker/total-sleep-time', [SleepTrackerController::class, 'indexTotalSleepTime']);
    Route::post('/sleep-tracker/total-sleep-time', [SleepTrackerController::class, 'createTotalSleepTime']);
    Route::put('/sleep-tracker/total-sleep-time/{id}', [SleepTrackerController::class, 'updateTotalSleepTime']);
    Route::delete('/sleep-tracker/total-sleep-time/{id}', [SleepTrackerController::class, 'destroyTotalSleepTime']);

    Route::get('/sleep-tracker/sleep-score', [SleepTrackerController::class, 'indexSleepScore']);
    Route::post('/sleep-tracker/sleep-score', [SleepTrackerController::class, 'createSleepScore']);
    Route::put('/sleep-tracker/sleep-score/{id}', [SleepTrackerController::class, 'updateSleepScore']);
    Route::delete('/sleep-tracker/sleep-score/{id}', [SleepTrackerController::class, 'destroySleepScore']);

    //For Water Intake
    //For Daily Goal
    Route::get('/water-intake/daily-goal', [WaterIntakeController::class, 'indexDailyGoal']);
    Route::post('/water-intake/daily-goal', [WaterIntakeController::class, 'createDailyGoal']);
    Route::put('/water-intake/daily-goal/{id}', [WaterIntakeController::class, 'updateDailyGoal']);
    Route::delete('/water-intake/daily-goal/{id}', [WaterIntakeController::class, 'destroyDailyGoal']);

    //For Total Intake
    Route::get('/water-intake/total-intake', [WaterIntakeController::class, 'indexTotalIntake']);
    Route::post('/water-intake/total-intake', [WaterIntakeController::class, 'createTotalIntake']);
    Route::put('/water-intake/total-intake/{id}', [WaterIntakeController::class, 'updateTotalIntake']);
    Route::delete('/water-intake/total-intake/{id}', [WaterIntakeController::class, 'destroyTotalIntake']);

    //For Current Intake
    Route::get('/water-intake/current-intake', [WaterIntakeController::class, 'indexCurrentIntake']);
    Route::post('/water-intake/current-intake', [WaterIntakeController::class, 'createCurrentIntake']);
    Route::put('/water-intake/current-intake/{id}', [WaterIntakeController::class, 'updateCurrentIntake']);
    Route::delete('/water-intake/current-intake/{id}', [WaterIntakeController::class, 'deleteCurrentIntake']);

    //For Reminder
    Route::get('/water-intake/reminder', [WaterIntakeController::class, 'indexReminder']);
    Route::post('/water-intake/reminder', [WaterIntakeController::class, 'createReminder']);
    Route::put('/water-intake/reminder/{id}', [WaterIntakeController::class, 'updateReminder']);
    Route::delete('/water-intake/reminder/{id}', [WaterIntakeController::class, 'destroyReminder']);

    //For Reminder Interval
    Route::get('/water-intake/reminder-interval', [WaterIntakeController::class, 'indexReminderInterval']);
    Route::post('/water-intake/reminder-interval', [WaterIntakeController::class, 'createReminderInterval']);
    Route::put('/water-intake/reminder-interval/{id}', [WaterIntakeController::class, 'updateReminderInterval']);
    Route::delete('/water-intake/reminder-interval/{id}', [WaterIntakeController::class, 'deleyeReminderInterval']);

    //For Today Log
    Route::get('/water-intake/today-log', [WaterIntakeController::class, 'indexTodayLog']);
    Route::post('/water-intake/today-log', [WaterIntakeController::class, 'createTodayLog']);
    Route::put('/water-intake/today-log/{id}', [WaterIntakeController::class, 'updateTodayLog']);
    Route::delete('/water-intake/today-log/{id}', [WaterIntakeController::class, 'destroyTodayLog']);

    //For Average and Frequency
    Route::get('/water-intake/average-and-frequency', [WaterIntakeController::class, 'indexAverageandFrequency']);
    Route::post('/water-intake/average-and-frequency', [WaterIntakeController::class, 'createAverageandFrequency']);
    Route::put('/water-intake/average-and-frequency/{id}', [WaterIntakeController::class, 'updateAverageandFrequency']);
    Route::delete('/water-intake/average-and-frequency/{id}', [WaterIntakeController::class, 'destroyAverageandFrequency']);
});


