<?php

namespace App\Http\Controllers;

use App\Models\UserVote;
use App\Models\ProfilePartai;
use App\Models\DimAdmin;
use App\Models\DimPartaiVoted;
use App\Models\DimTempat;
use App\Models\DimWaktu;
use App\Models\FactVotes;
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
    $chartData1 = FactVotes::select('sk_waktu')
        ->selectRaw('count(*) as count')
        ->groupBy('sk_waktu')
        ->get();

// Join the ProfilePartai model to get nominal_suap_gratifikasi
    $chartData1 = $chartData1->map(function ($item1) {
        $dim_waktu = DimWaktu::where('sk_waktu', $item1->sk_waktu)->first();
        $item1->hari = $DimWaktu->hari;
        $item1->kuartal = $DimWaktu->kuartal;
        $item1->bulan = $DimWaktu->nama_bulan;
        $item1->tahun = $DimWaktu->tahun;
        $item1->tanggal = $DimWaktu->tanggal;
        return $item1;
    });

    return response()->json(['chartData' => $chartData, 'chartData1' => $chartData1]);
}
}