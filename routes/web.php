<?php

use App\Http\Controllers\Web\AuthenticationController;
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

//For Admin
Route::get('/admin-home', [AuthenticationController::class, 'adminHome'])->name('admin.home');

//For Users
Route::get('/user-home', [AuthenticationController::class, 'userHome'])->name('user.home');

Route::get('/admin-home', [AuthenticationController::class, 'showUserCount']);/**line where admin-home is being called to display total number of users in the admin dashboard */


