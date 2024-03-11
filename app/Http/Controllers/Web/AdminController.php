<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\StepTrackerLeaderboard;
use App\Models\User;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    
    public function userTable(){
        return view('admin.user-table');
    }

    public function userFeedbacks(){
        $feedbacks = UserFeedback::all();

        return view('admin\user-feedbacks', compact('feedbacks'));
    }
    

    public function getUser(Request $request){
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function adminHome(){
        //counts users and admin in the database
        $userCount = User::where('role', 'user')->count();
        // active user count
        $activeUsersCount = User::where('status', 'online')
                                ->where('role', 'user')
                                ->count();
        // offline user count
        $unactiveUsersCount = User::where('status', 'offline')
                                ->where('role', 'user')
                                ->count();
        

        $adminCount = User::where('role', 'admin')->count();

        // Count users by gender
        $userCountsByMaleGender = User::where('gender', 'male')->count();
        $userCountsByFemaleGender = User::where('gender', 'female')->count();
        
        $activeAdminsCount = User::where('status', 'online')->count();
        
        

        //returns view
        return view('admin.home', [
            'userCount' => $userCount,
            'activeUsersCount' => $activeUsersCount,
            'unactiveUsersCount' => $unactiveUsersCount,
            'adminCount' => $adminCount,
            'userCountsByMaleGender' => $userCountsByMaleGender,
            'userCountsByFemaleGender' => $userCountsByFemaleGender,
            
        ]);
            
    }
    
    public function userSearch(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $users = User::where('name', 'like', '%'.$searchTerm.'%')->get();
        return view('admin.user-table', compact('users'));
    }

    public function indexUsers(){
        $users = User::get();
        return view('admin.user-table', compact('users'));
    }

    public function createUsers(){
        return view('admin.user-table.create');
    }

    public function storeUsers(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
            'height' => 'required|numeric', // Validate as numeric (including decimals)
            'weight' => 'required|numeric', // Validate as numeric (including decimals)
            'gender' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ], [
            'name' => 'Please enter your name',
            'email' => 'Please enter your email',
            'age' => 'Please enter your age',
            'height' => 'Please enter your heigh in kilograms',
            'weight' => 'Please enter your weight in kilograms',
            'gender' => 'Please enter your gender [male or female Only]',
            'password.min' => 'The password must be at least 8 characters.',
            'confirm_password.same' => 'The password and password confirmation does not match.',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['age'] = $request->age;
        $data['height'] = $request->height;
        $data['weight'] = $request->weight;
        $data['gender'] = $request->gender;
        $data['password'] = Hash::make($request->password);
        $data['confirm_password'] = $request->confirm_password;
        $data['role'] = 'user';
        $data['status'] = 'online';

        User::create($data);
        return redirect()->route('admin')->with("success", "User successfully created");
    
         
    }

    public function editUsers(int $id){
        $users = User::findOrFail($id);
        //return $students;
        return view('admin.user-table.edit', compact('users'));
    }

    public function updateUsers(Request $request, int $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'height' => 'required|numeric', // Validate as numeric (including decimals)
            'weight' => 'required|numeric', // Validate as numeric (including decimals)
            'gender' => 'required|string',
        ]);
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);
        return redirect()->route('admin.user.table')->with('status', 'User Data Updated');
    }

    public function destroyUsers(int $id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('status', 'Users Data Deleted');
    }

    // public function chartData() {

    //     $stepHistory = StepTrackerLeaderboard::where('step_tracker_leaderboard', 'steps')
    //                                             ->count();

    //     $stepHistoryData = [
    //         [
    //             'label' => 'STEPS',
    //             'value' => $stepHistory
    //         ]
    //     ];

    //     return response() -> json([
    //         'stepHistoryData' => $stepHistoryData
    //     ]);
    // }
}
