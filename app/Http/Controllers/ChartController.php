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
    return response()->json($chartData);
}
    public function getTimeData(Request $request)
{
    $selectedMonth = $request->input('nama_bulan');

    $timeData = FactVotes::select('sk_waktu')
    ->selectRaw('count(*) as count')
    ->when($selectedMonth, function($query_month) use ($selectedMonth){
        $query_month->whereHas('dimWaktu', function($subquery) use ($selectedMonth){
           $subquery->where('nama_bulan', $selectedMonth);
        });
    })
    ->groupBy('sk_waktu')
    ->get();

    $timeData = $timeData->map(function($item1){
        $time = DimWaktu::where('sk_waktu', $item1->sk_waktu)->first();
    return [
                'sk_waktu' => $item1->sk_waktu,
                'count' => $item1->count,
                'year' => optional($time)->tahun,
                'quartal' => optional($time)->kuartal,
                'month' => optional($time)->nama_bulan,
                'day' => optional($time)->hari,
                'date' => optional($time)->tanggal
            ];
        });
    
        return response()->json($timeData);
    }
}