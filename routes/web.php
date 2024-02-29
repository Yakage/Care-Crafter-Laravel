<?php

use App\Http\Controllers\Web\SleepTrackerController;
use App\Http\Controllers\WaterIntakeController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthenticationController;
use App\Http\Controllers\Web\UserController;
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
Route::get('/user/user-ui/user', [UserController::class, 'userDashboard'])->name('user.user-ui.user');
Route::get('/user/user-ui/user', 'UserController@index')->name('user.user-ui.user')->middleware('auth');
Route::get('/user/user-ui/user', [UserController::class, 'userDashboard'])->name('user.user-ui.user');
Route::post('/user/user-ui/user', 'UserController@update')->middleware('auth');
Route::get('/user-feedback', [UserController::class, 'userFeedback'])->name('user.feedback');


//Route::get('/admin-home', [AuthenticationController::class, 'showUserCount']);/**line where admin-home is being called to display total number of users in the admin dashboard */

//For Step Tracker



//For Sleep Tracker
Route::get('/getHistoryOfSleepTracker', [SleepTrackerController::class, 'getHistoryOfSleepTracker']);


//For Water Intake
Route::group(['middleware' => 'auth'], function(){
    Route::get('water-intake', [WaterIntakeController::class, 'index'])->name('water-intake.index');
    Route::get('water-intake/create', [WaterIntakeController::class, 'create'])->name('water-intake.create');
    Route::post('water-intake', [WaterIntakeController::class, 'store'])->name('water-intake.store');
    Route::get('water-intake/{waterIntake}', [WaterIntakeController::class, 'show'])->name('water-intake.show');
    Route::get('water-intake/{waterIntake}/edit', [WaterIntakeController::class, 'edit'])->name('water-intake.edit');
    Route::put('water-intake/{waterIntake}', [WaterIntakeController::class, 'update'])->name('water-intake.update');
    Route::delete('water-intake/{waterIntake}', [WaterIntakeController::class, 'destroy'])->name('water-intake.destroy');
});

//For users logout
Route::get('/welcome', function () {return view('welcome');})->name('welcome');