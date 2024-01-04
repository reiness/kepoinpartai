<?php

namespace App\Http\Controllers;

use App\Models\DimTempat;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCitiesByProvince($province)
    {
        $cities = DimTempat::where('province', $province)->pluck('city');
        return response()->json($cities);
    }
}
