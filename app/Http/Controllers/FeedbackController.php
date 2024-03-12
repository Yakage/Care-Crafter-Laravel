<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller{
    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'message' => 'required|min:5|max:700' // Validation rules
        ], [
            'message.max' => 'The message must not exceed 700 characters.'
        ]);
    
        $feedback = new UserFeedback;
        $feedback->name = $user->name;
        $feedback->message = $request->input('message');
        $feedback->user_id = auth()->id(); // Assuming user authentication
        $feedback->save();

        // Redirect to the 'user.feedback' view
        return redirect()->route('user.feedback')->with('success', 'Feedback successfully submitted');
    }
    
}
