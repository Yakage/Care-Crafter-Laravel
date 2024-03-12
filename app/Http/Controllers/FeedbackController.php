<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'message' => 'required|min:5' // Validation rules
        ]);

        $feedback = new UserFeedback;
        $feedback->name = $user->name;
        $feedback->message = $request->input('message');
        $feedback->user_id = auth()->id(); // Assuming user authentication

        $feedback->save();

        $feedbacks = UserFeedback::all();

        return view('user.feedback', compact('feedbacks'));
    }
}
