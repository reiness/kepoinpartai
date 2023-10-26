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

    // Join the ProfilePartai model to get nominal_suap_gratifikasi
    $chartData = $chartData->map(function ($item) {
        $partai = ProfilePartai::where('id_partai', $item->id_partai)->first();
        $item->nama_partai = $partai->nama_partai;
        $item->nominal_suap_gratifikasi = $partai->nominal_suap_gratifikasi;
        $item->nominal_kasus_korupsi = $partai->nominal_kasus_korupsi;
        return $item;
    });

    return response()->json($chartData);
}
}
