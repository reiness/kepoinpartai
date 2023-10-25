<?php

namespace App\Http\Controllers;

use App\Models\UserVote;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __invoke()
    {
        $chartData = UserVote::select('id_partai')
            ->selectRaw('count(*) as count')
            ->groupBy('id_partai')
            ->get();

        // Debugging output
        // dd($chartData);

        return response()->json($chartData);
    }
}