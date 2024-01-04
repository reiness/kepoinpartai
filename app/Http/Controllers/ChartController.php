<?php

namespace App\Http\Controllers;

use App\Models\UserVote;
use App\Models\ProfilePartai;
// use App\Models\FactVotes;
use App\Models\DimTempat;
use App\Models\DimAdmin;
use App\Models\DimPartaiVoted;
// use App\Models\DimTempat;
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

        // dd($chartData);

        // Join the ProfilePartai model to get nominal_suap_gratifikasi
        $chartData = $chartData->map(function ($item) {
            $partai = ProfilePartai::where('id_partai', $item->id_partai)->first();
            $item->nama_partai = $partai->nama_partai;
            $item->nominal_suap_gratifikasi = $partai->nominal_suap_gratifikasi;
            $item->nominal_kasus_korupsi = $partai->nominal_kasus_korupsi;
            // dd($item);
            return $item;
            
    });
        return response()->json($chartData);
    }

    // Add the new method for location data
    public function getLocationData(Request $request)
    {
        $selectedProvince = $request->input('province');
        
        $locationData = FactVotes::select('id_tempat') // Change from 'sk_tempat' to 'id_tempat'
            ->selectRaw('count(*) as count')
            ->when($selectedProvince && $selectedProvince !== 'All Provinces', function ($query) use ($selectedProvince) {
                $query->whereHas('dimTempat', function ($subquery) use ($selectedProvince) {
                    $subquery->where('province', $selectedProvince);
                });
            })
            ->when($selectedProvince === 'All Provinces', function ($query) {
                $query->join('dim_tempats', 'dim_tempats.sk_tempat', '=', 'fact_votes.id_tempat') // Change from 'sk_tempat' to 'id_tempat'
                    ->groupBy('dim_tempats.province');
            })
            ->groupBy('id_tempat') // Change from 'sk_tempat' to 'id_tempat'
            ->get();
        
        $locationData = $locationData->map(function ($item) use ($selectedProvince) {
            if ($selectedProvince === 'All Provinces') {
                return [
                    'province' => optional($item->dimTempat)->province,
                    'count' => $item->count,
                ];
            } else {
                $tempat = DimTempat::where('sk_tempat', $item->id_tempat)->first(); // Change from 'sk_tempat' to 'id_tempat'

                return [
                    'id_tempat' => $item->id_tempat, // Change from 'sk_tempat' to 'id_tempat'
                    'count' => $item->count,
                    'province' => optional($tempat)->province,
                    'city' => optional($tempat)->city,
                ];
            }
        });
        
        return response()->json($locationData);
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