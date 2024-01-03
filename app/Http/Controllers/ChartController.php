<?php

namespace App\Http\Controllers;

use App\Models\UserVote;
use App\Models\ProfilePartai;
use App\Models\FactVotes;
use App\Models\DimTempat;
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
    
        $locationData = FactVotes::select('sk_tempat')
            ->selectRaw('count(*) as count')
            ->when($selectedProvince, function ($query) use ($selectedProvince) {
                $query->whereHas('dimTempat', function ($subquery) use ($selectedProvince) {
                    $subquery->where('province', $selectedProvince);
                });
            })
            ->groupBy('sk_tempat')
            ->get();
    
        $locationData = $locationData->map(function ($item) {
            $tempat = DimTempat::where('sk_tempat', $item->sk_tempat)->first();
    
            return [
                'sk_tempat' => $item->sk_tempat,
                'count' => $item->count,
                'province' => optional($tempat)->province,
                'city' => optional($tempat)->city,
            ];
        });
    
        return response()->json($locationData);
    }
    
}
