<?php

use App\Http\Controllers\Api\AuthenticationController;
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
Route::get('/users', [UserController::class, 'getUser']);

// for User Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// for Step Tracker CRUD Api
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'getUser']);

// Step Tracker CRUD API
Route::middleware('auth:sanctum')->post('/step-trackers', [StepTrackerController::class, 'store']);
Route::middleware('auth:sanctum')->get('/step-trackers/{stepTracker}', [StepTrackerController::class, 'show']);
Route::middleware('auth:sanctum')->put('/step-trackers/{stepTracker}', [StepTrackerController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/step-trackers/{stepTracker}', [StepTrackerController::class, 'destroy']);