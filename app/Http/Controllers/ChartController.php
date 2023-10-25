<?php

namespace App\Http\Controllers;

use App\Models\UserVote;
use App\Models\ProfilePartai;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        $chartData = UserVote::select('id_partai')
            ->selectRaw('count(*) as count')
            ->groupBy('id_partai')
            ->get();

        // Retrieve the corresponding nama_partai for each id_partai
        $chartData = $chartData->map(function ($item) {
            $partai = ProfilePartai::where('id_partai', $item->id_partai)->first();
            $item->nama_partai = $partai->nama_partai;
            return $item;
        });

        return response()->json($chartData);
    }
}
