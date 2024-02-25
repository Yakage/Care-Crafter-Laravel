<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function getUser(Request $request){
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function adminHome(){
        //counts users in the database
            $userCount = User::count();
        // Count users by gender
            $userCountsByGender = User::selectRaw('gender, count(*) as user_count')
            ->groupBy('gender')
            ->get()
            ->pluck('user_count', 'gender');
        // active user count
            $activeUsersCount = User::where('status', 'online')->count();
        //returns view
            return view('admin.home', [
                'userCount' => $userCount,
                'userCountsByGender' => $userCountsByGender,
                'activeUsersCount' => $activeUsersCount]);
            
    }
    
    public function indexUsers(){
        $users = User::get();
        return view('admin.user-table', compact('users'));
    }

    public function create(){
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

        $user = User::create($data);
        if ($user) {
            return redirect()->route('admin')->with("success", "User successfully created");
        } else {
            return redirect()->back()->with("error", "Failed to register user, please try again.");
        }
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
            'age' => 'required|integer',
            'height' => 'required|numeric', // Validate as numeric (including decimals)
            'weight' => 'required|numeric', // Validate as numeric (including decimals)
            'gender' => 'required|string',
        ]);
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
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
}
