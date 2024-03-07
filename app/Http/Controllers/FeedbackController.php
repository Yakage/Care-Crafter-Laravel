<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|min:5' // Validation rules
        ]);

        $feedback = new UserFeedback;
        $feedback->message = $request->input('message');
        $feedback->user_id = auth()->id(); // Assuming user authentication

        $feedback->save();

        $feedbacks = UserFeedback::all();

        return view('admin\user-feedbacks', compact('feedbacks'));
    }
}
