<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            // The user is authenticated, so get their email
            $userEmail = Auth::user()->email;
            // dd($userEmail);
        } else {
            // The user is not authenticated, so set the email to null or a default value
            $userEmail = null;
        }

        $data = $request->validate([
            'nama' => 'required',
            'feedbacks' => 'required',
        ]);

        // Add the user's email to the data
        $data['email'] = $userEmail;

        Feedback::create($data);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
