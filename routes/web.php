<?php

use App\Http\Controllers\Web\SleepTrackerController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthenticationController;
use App\Http\Controllers\Web\BMIController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Web\StepTrackerController;
use App\Http\Controllers\Web\WaterIntakeController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// For Authentication
Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register', [AuthenticationController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');



//For Admin
Route::get('/admin-home', [AdminController::class, 'adminHome'])->name('admin.home');
Route::get('/admin.user-feedbacks', [AdminController::class, 'userFeedbacks'])->name('admin.user.feedbacks');
Route::get('/search', [AdminController::class, 'userSearch'])->name('user.search');
Route::get('/admin.user-table', [AdminController::class, 'indexUsers'])->name('admin.user.table');
Route::get('/admin.user-table.create', [AdminController::class, 'createUsers']);
Route::post('/admin.user-table.create' , [AdminController::class, 'storeUsers']);
Route::get('/admin.user-table.{id}.edit', [AdminController::class, 'editUsers']);
Route::put('/admin.user-table/{id}/edit', [AdminController::class, 'updateUsers']);
Route::get('/admin.user-table.{id}.delete', [AdminController::class, 'destroyUsers']);

//For Users
Route::get('/user-home', [AuthenticationController::class, 'userHome'])->name('user.home');
//user dash
Route::get('/user/user-ui/user', 'UserController@index')->name('user.user-ui.user')->middleware('auth');
Route::get('/user/user-ui/user', [UserController::class, 'userDashboard'])->name('user.user-ui.user');
Route::post('/user/user-ui/user', [UserController::class, 'update']);
Route::get('/user-feedback', [UserController::class, 'userFeedback'])->name('user.feedback');
Route::get('/user-home', [UserController::class, 'userHome'])->name('user.home');
Route::get('/user-leaderboard', [UserController::class, 'leaderboard'])->name(('user.leaderboards'));
Route::get('/user-stepTracker', [UserController::class, 'stepTracker'])->name(('user.stepTracker'));
Route::get('/user-sleepTracker', [UserController::class, 'sleepsTracker'])->name(('user.sleepsTracker'));
Route::get('/user-waterIntake', [UserController::class, 'waterIntake'])->name(('user.waterIntake'));


//feedback
Route::post('/user-feedback', [FeedbackController::class, 'store'])->name('store.Feedback');

//For Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'showLeaderboard'])->name('leaderboard');



//Route::get('/admin-home', [AuthenticationController::class, 'showUserCount']);/**line where admin-home is being called to display total number of users in the admin dashboard */

//For Step Tracker
Route::get('/getStepHistory', [StepTrackerController::class, 'getStepHistory']);
Route::post('/createStepHistory', [StepTrackerController::class, 'createStepHistory']);

//For Sleep Tracker
Route::get('/chartDataSleepsWeekly', [SleepTrackerController::class, 'chartDataSleepsWeekly']);
Route::get('/chartDataSleepsMonthly', [SleepTrackerController::class, 'chartDataSleepsMonthly']);

//Chart Step Tracker
Route::get('/chartDataStepsWeekly', [StepTrackerController::class, 'chartDataStepsWeekly']);
Route::get('/chartDataStepsMonthly', [StepTrackerController::class, 'chartDataStepsMonthly']);


//Chart Water Intake
Route::get('/chartDataWaterWeekly', [WaterIntakeController::class, 'chartDataWaterWeekly']);
Route::get('/chartDataWaterMonthly', [WaterIntakeController::class, 'chartDataWaterMonthly']);



//For Water Intake

//For BMI
Route::get('/getHistoryOfBMI', [BMIController::class, 'getBMI']);
Route::post('/createBMI', [BMIController::class, 'createBMI']);
//For users logout
//For sleep controller
Route::get('/welcome', function () {return view('welcome');})->name('welcome');