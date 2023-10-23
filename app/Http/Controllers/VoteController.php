<?php

namespace App\Http\Controllers;
use App\Models\ProfilePartai;
use App\Models\UserVote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        // Retrieve data from the ProfilePartai model and pass it to the view
        $partaiData = ProfilePartai::all();

        return view('vote', ['partaiData' => $partaiData]);
    }

    public function vote(Request $request)
{
    // dd('halo');
    // Get the user's user_email (you may need to modify this part)
    $userEmail = auth()->user()->email;
    // dd($userEmail);

    // Check if the user has already voted
    $existingVote = UserVote::where('user_email', $userEmail)->first();

    if ($existingVote) {
        return response()->json(['success' => false]);
    }

    // If the user hasn't voted, insert the vote into the user_vote table
    UserVote::create([
        'user_email' => $userEmail,
        'id_partai' => $request->input('id_partai'),
    ]);

    return response()->json(['success' => true]);
}

}
