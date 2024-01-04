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

    $timeData = FactVotes::select('id_waktu')
    ->selectRaw('count(*) as count')
    ->when($selectedMonth && $selectedMonth !=='All Months', function($query_month) use ($selectedMonth){
        $query_month->whereHas('dimWaktu', function($subquery) use ($selectedMonth){
           $subquery->where('nama_bulan', $selectedMonth);
        });
    })
    ->when($selectedMonth === 'All Months', function($query_month){
        $query_month->join('dim_waktus', 'dim_waktus.sk_waktu', '=','fact_votes.id_waktu') 
        ->groupBy('dim_waktus.nama_bulan');
    })
    ->groupBy('id_waktu')
    ->get();

    $timeData = $timeData->map(function($item1) use($selectedMonth){
        if($selectedMonth === 'All Months'){
            return[
                'nama_bulan' => optional($item1->dimWaktu)->nama_bulan,
                'count' => $item1->count,
            ];
        }else{
            $waktu = DimWaktu::where('sk_waktu', $item1->id_waktu)->first();
            
            return[
                'id_waktu' => $item1->id_waktu,
                'count' => $item1->count,
                'tahun' => optional($waktu)->tahun,
                'kuartal' => optional($waktu)->kuartal,
                'nama_bulan' => optional($waktu)->nama_bulan,
                'hari' => optional($waktu)->hari,
            ];
        }
        });
    
        return response()->json($timeData);
    }
}