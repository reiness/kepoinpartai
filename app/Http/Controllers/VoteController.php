<?php

namespace App\Http\Controllers;
use App\Models\ProfilePartai;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function showNamaPartai($id)
    {
        $profilePartai = ProfilePartai::with('images')->find($id);

        if ($profilePartai) {
            $namaPartai = $profilePartai->nama_partai;
            return response()->json(['nama_partai' => $namaPartai]);
        } else {
            return response()->json(['nama_partai' => 'Not found']);
        }
    }


public function index()
{

    return view('vote'); 
}
}
