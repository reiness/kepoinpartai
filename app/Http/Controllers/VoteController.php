<?php

namespace App\Http\Controllers;

use App\Models\ProfilePartai;
use App\Models\UserVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $partaiData = ProfilePartai::all();
        return view('vote', ['partaiData' => $partaiData]);
    }

    public function vote(Request $request)
    {
        $userEmail = Auth::user()->email;
        $idPartai = $request->input('id_partai');

        $existingVote = UserVote::where('user_email', $userEmail)->first();

        if ($existingVote) {
            $existingVote->update([
                'id_partai' => null, // Set the existing id_partai to null
            ]);
        }

        UserVote::create([
            'user_email' => $userEmail,
            'id_partai' => $idPartai,
        ]);

        return response()->json(['message' => 'Vote successful']);
    }

    public function revote(Request $request)
{
    $userEmail = Auth::user()->email;
    $idPartai = $request->input('id_partai');

    $existingVote = UserVote::where('user_email', $userEmail)->first();

    if ($existingVote) {
        // Update the existing vote
        $existingVote->update([
            'id_partai' => $idPartai,
        ]);

        return response()->json(['message' => 'Vote updated successfully']);
    } else {
        // Create a new vote
        UserVote::create([
            'user_email' => $userEmail,
            'id_partai' => $idPartai,
        ]);

        return response()->json(['message' => 'Vote successful']);
    }
}

        

    public function check(Request $request)
    {
        $userEmail = Auth::user()->email;
        $idPartai = $request->input('id_partai');

        $alreadyVoted = UserVote::where('user_email', $userEmail)
            ->where('id_partai', $idPartai)
            ->exists();

        return response()->json(['alreadyVoted' => $alreadyVoted]);
    }
}
