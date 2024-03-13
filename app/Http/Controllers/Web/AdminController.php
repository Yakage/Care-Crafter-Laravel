<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SleepTrackerLeaderboard;
use App\Models\StepTrackerLeaderboard;
use App\Models\User;
use App\Models\UserFeedback;
use App\Models\UserLogin;
use App\Models\WaterIntakeLeaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    
    public function userTable(){
        return view('admin.user-table');
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
        $userCountsByMaleGender = User::where('gender', 'male')
                                        ->where('role', 'user')
                                        ->count();
        $userCountsByFemaleGender = User::where('gender', 'female')
                                        ->where('role', 'user')
                                        ->count();
        
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
    

    // For Statistics Home
    public function getUsersLoggedInPerWeek() {
        // Get the current date
        $today = date('Y-m-d');
    
        // Calculate the start and end of the current week
        $startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($today)));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($today)));
    
        // Initialize an array to store the result
        $usersLoggedInPerWeek = [];
    
        // Loop through each day of the week
        $currentDate = $startOfWeek;
        while ($currentDate <= $endOfWeek) {
            // Query to count distinct users who logged in on the current day
            $totalLoggedInUsers = UserLogin::whereDate('login_at', $currentDate)
                ->distinct('user_id')
                ->count();
    
            // Get the name of the weekday for the current date
            $weekday = date('l', strtotime($currentDate));
    
            // Add the count to the result array with the weekday name as the key
            $usersLoggedInPerWeek[$weekday] = $totalLoggedInUsers;
    
            // Move to the next day
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
    
        return $usersLoggedInPerWeek;
    }

    public function featuresStatistics(){
        $totalUsersInWater= WaterIntakeLeaderboard::distinct('user_id')->count();
        $totalUsersInSteps = StepTrackerLeaderboard::distinct('user_id')->count();
        $totalUsersInSleeps = SleepTrackerLeaderboard::distinct('user_id')->count();
        
        return [
            'totalUsersInSteps' => $totalUsersInSteps,
            'totalUsersInSleeps' => $totalUsersInSleeps,
            'totalUsersInWater' => $totalUsersInWater,
        ];
    }


    //For USer Table

    public function userSearch(Request $request){
        $searchTerm = $request->input('searchTerm');
        $users = User::where(function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%'.$searchTerm.'%')
                              ->orWhere('email', 'like', '%'.$searchTerm.'%');
                    })
                    ->get();
        return view('admin.user-table', compact('users'));
    }
    

    public function indexUsers(){
        $users = User::get();
        return view('admin.user-table', compact('users'));
    }

    public function createUsers(){
        return view('admin.user-table.create');
    }

    public function storeUsers(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255', // Limit name to 255 characters
        'email' => 'required|email|unique:users|max:255', // Limit email to 255 characters
        'birthday' => 'required|date',
        'gender' => 'required|in:male,female', // Specify allowed gender values
        'height' => 'required|numeric|min:1|max:300', // Limit height between 1 and 300 cm
        'weight' => 'required|numeric|min:1|max:300', // Limit weight between 1 and 300 kg
        'password' => 'required|string|min:8',
        'confirm_password' => 'required|string|same:password',
    ], [
        'name.max' => 'Name must not exceed 255 characters.',
        'email.max' => 'Email must not exceed 255 characters.',
        'gender.in' => 'Gender must be either male or female.',
        'height.numeric' => 'Height must be a numeric value.',
        'height.min' => 'Height must be at least 1 cm.',
        'height.max' => 'Height cannot exceed 300 cm.',
        'weight.numeric' => 'Weight must be a numeric value.',
        'weight.min' => 'Weight must be at least 1 kg.',
        'weight.max' => 'Weight cannot exceed 300 kg.',
        'password.min' => 'The password must be at least 8 characters.',
        'confirm_password.same' => 'The password and password confirmation do not match.',
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['birthday'] = $request->birthday;
    $data['gender'] = $request->gender;
    $data['height'] = $request->height;
    $data['weight'] = $request->weight;
    $data['password'] = Hash::make($request->password);
    $data['confirm_password'] = $request->confirm_password;
    $data['role'] = 'user';
    $data['status'] = 'online';

    try {
        User::create($data);
        return redirect()->route('admin.user-table.create')->with("success", "User Data successfully created");
    } catch (\Exception $e) {
        // Handle the exception, for example, log it
        Log::error($e->getMessage());
        return redirect()->route('admin.user-table.create')->with("error", "User Data not created");
    }
}


    public function editUsers(int $id){
        $users = User::findOrFail($id);
        //return $students;
        return view('admin.user-table.edit', compact('users'));
    }

    public function updateUsers(Request $request, int $id){
        $request->validate([
            'name' => 'required|string|max:255', // Limit name to 255 characters
            'email' => 'required|email|unique:users|max:255', // Limit email to 255 characters
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female', // Specify allowed gender values
            'height' => 'required|numeric|min:1|max:300', // Limit height between 1 and 300 cm
            'weight' => 'required|numeric|min:1|max:300', // Limit weight between 1 and 300 kg
        ], [
            'name.max' => 'Name must not exceed 255 characters.',
            'email.max' => 'Email must not exceed 255 characters.',
            'gender.in' => 'Gender must be either male or female.',
            'height.numeric' => 'Height must be a numeric value.',
            'height.min' => 'Height must be at least 1 cm.',
            'height.max' => 'Height cannot exceed 300 cm.',
            'weight.numeric' => 'Weight must be a numeric value.',
            'weight.min' => 'Weight must be at least 1 kg.',
            'weight.max' => 'Weight cannot exceed 300 kg.',
        ]);
        
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);
        return redirect()->route('admin.user-table')->with("success", "User Data successfully updated");
    }

    public function destroyUsers(int $id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'Users Data Deleted');
    }
    
     // For Feedbacks
     public function userFeedbacks(){
        $users = User::all();
        $feedbacks = UserFeedback::all();
        return view('admin.user-feedbacks', compact('feedbacks', 'users'));
    }

    public function feedbackSearch(Request $request){
        $searchTerm = $request->input('searchTerm');
        $feedbacks = UserFeedback::where(function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%'.$searchTerm.'%')
                              ->orWhere('message', 'like', '%'.$searchTerm.'%');
                    })
                    ->get();
        return view('admin.user-feedbacks', compact('feedbacks'));
    }
}
