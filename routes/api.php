<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\StepTrackerController;
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

// for Step Tracker CRUD Api
Route::post('/step-trackers', [StepTrackerController::class, 'store']);
Route::get('/step-trackers/{stepTracker}', [StepTrackerController::class, 'show']);
Route::put('/step-trackers/{stepTracker}', [StepTrackerController::class, 'update']);
Route::delete('/step-trackers/{stepTracker}', [StepTrackerController::class, 'destroy']);