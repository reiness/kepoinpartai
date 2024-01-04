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
}
