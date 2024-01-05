<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoteController; 
use App\Http\Controllers\ProfilePartaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'auth.admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Delete User
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

Auth::routes(); // This automatically sets up login, registration, and other authentication routes.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/partai-table', [AdminController::class, 'partaiTable'])->name('admin.partaiTable');
// Route::get('/admin/partai/edit/{id_partai}', [AdminController::class, 'editPartai'])->name('admin.editPartai');
Route::put('/admin/updatePartai/{id_partai}', [AdminController::class, 'updatePartai'])->name('admin.updatePartai');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Route::get('/vote', [VoteController::class, 'index'])->name('vote');
// Route::get('/vote/{id}', [VoteController::class, 'showIdPartai']);
Route::get('/vote', [VoteController::class, 'index'])->name('vote');
Route::post('/vote', [VoteController::class, 'vote'])->name('vote.vote');
Route::post('/vote/revote', [VoteController::class, 'revote'])->name('vote.revote');
Route::get('/vote/check', [VoteController::class, 'check'])->name('vote.check');

Route::get('/partai_all', function () {
    return view('partai_all');
})->name('partai_all');

Route::get('/kasus_viz', function () {
    return view('kasus_viz');
})->name('kasus_viz');


Route::get('/api/cities/{province}', [CityController::class, 'getCitiesByProvince']);
// CHARTS
Route::get('/getChartData', [ChartController::class, 'getChartData'])->name('chart.data');
Route::get('/chart/location-data', [ChartController::class, 'getLocationData'])->name('chart.location-data');

Route::get('/chart/timedata', [ChartController::class, 'getTimeData'])->name('chart.timedata');

// Route::get('/vote', function () {
//     return view('vote');
// })->name('vote');

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');
Route::post('/feedback', 'App\Http\Controllers\FeedbackController@store')->name('store.feedback');

//  PARTAIS  //
Route::get('/partai/pdip', function () {
    $profile_pdip = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Demokrasi Indonesia Perjuangan (PDIP)')
                    ->first();
    return view('partai.pdip', ['image' => 'image_3.png', 'profile_pdip' => $profile_pdip]);
})->name('partai.pdip');

Route::middleware(['auth', 'auth.admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Delete User
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

Auth::routes(); // This automatically sets up login, registration, and other authentication routes.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/partai-table', [AdminController::class, 'partaiTable'])->name('admin.partaiTable');
// Route::get('/admin/partai/edit/{id_partai}', [AdminController::class, 'editPartai'])->name('admin.editPartai');
Route::put('/admin/updatePartai/{id_partai}', [AdminController::class, 'updatePartai'])->name('admin.updatePartai');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/partai_all', function () {
    return view('partai_all');
})->name('partai_all');



Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');
Route::post('/feedback', 'App\Http\Controllers\FeedbackController@store')->name('store.feedback');

//  PARTAIS  //
Route::get('/partai/pdip', function () {
    $profile_pdip = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Demokrasi Indonesia Perjuangan (PDIP)')
                    ->first();
    return view('partai.pdip', ['image' => 'image_3.png', 'profile_pdip' => $profile_pdip]);
})->name('partai.pdip');

Route::get('/partai/garuda', function () {
    $profile_garuda = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Garda Perubahan Indonesia (GARUDA)')
                    ->first();
    return view('partai.garuda', ['image' => 'image_11.png', 'profile_garuda' => $profile_garuda]);
})->name('partai.garuda');

Route::get('/partai/gerindra', function () {
    $profile_gerindra = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Gerakan Indonesia Raya (GERINDRA)')
                    ->first();
    return view('partai.gerindra', ['image' => 'image_2.png', 'profile_gerindra' => $profile_gerindra]);
})->name('partai.gerindra');

Route::get('/partai/PAN', function () {
    $profile_PAN = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Amanat Nasional (PAN)')
                    ->first();

    return view('partai.PAN', ['image' => 'image_12.png', 'profile_PAN' => $profile_PAN]);
})->name('partai.PAN');



Route::get('/partai/NasDem', function () {
    $profile_NasDem = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Nasional Demokrat (NasDem)')
                    ->first();
    return view('partai.NasDem', ['image' => 'image_5.png', 'profile_NasDem' => $profile_NasDem]);
})->name('partai.NasDem');


Route::get('/partai/buruh', function () {
    $profile_buruh = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Buruh')
                    ->first();
    return view('partai.buruh', ['image' => 'image_6.png', 'profile_buruh' => $profile_buruh]);
})->name('partai.buruh');

Route::get('/partai/golkar', function () {
    $profile_golkar = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Golongan Karya (Golkar)')
                    ->first();
    return view('partai.golkar', ['image' => 'image_4.png', 'profile_golkar' => $profile_golkar]);
})->name('partai.golkar');

Route::get('/partai/perindo', function () {
    $profile_perindo = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Persatuan Indonesia (PERINDO)')
                    ->first();
    return view('partai.perindo', ['image' => 'image_16.png', 'profile_perindo' => $profile_perindo]);
})->name('partai.perindo');

Route::get('/partai/demokrat', function () {
    $profile_demokrat = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Demokrat')
                    ->first();
    return view('partai.demokrat', ['image' => 'image_14.png', 'profile_demokrat' => $profile_demokrat]);
})->name('partai.demokrat');


Route::get('/partai/PSI', function () {
    $profile_PSI = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Solidaritas Indonesia (PSI)')
                    ->first();

    return view('partai.PSI', ['image' => 'image_15.png', 'profile_PSI' => $profile_PSI]);})->name('partai.PSI');

    Route::get('/partai/pks', function () {
        $profile_pks = DB::table('profile_partai')
                        ->where('nama_partai', 'Partai Keadilan Sejahtera (PKS)')
                        ->first();
        return view('partai.pks', ['image' => 'image_8.png', 'profile_pks' => $profile_pks]);
    })->name('partai.pks');
    
Route::get('/partai/garuda', function () {
    $profile_garuda = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Garda Perubahan Indonesia (GARUDA)')
                    ->first();
    return view('partai.garuda', ['image' => 'image_11.png', 'profile_garuda' => $profile_garuda]);
})->name('partai.garuda');

Route::get('/partai/gerindra', function () {
    $profile_gerindra = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Gerakan Indonesia Raya (GERINDRA)')
                    ->first();
    return view('partai.gerindra', ['image' => 'image_2.png', 'profile_gerindra' => $profile_gerindra]);
})->name('partai.gerindra');

Route::get('/partai/golkar', function () {
    $profile_golkar = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Golongan Karya (Golkar)')
                    ->first();
    return view('partai.golkar', ['image' => 'image_4.png', 'profile_golkar' => $profile_golkar]);
})->name('partai.golkar');

Route::get('/partai/perindo', function () {
    $profile_perindo = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Persatuan Indonesia (PERINDO)')
                    ->first();
    return view('partai.perindo', ['image' => 'image_16.png', 'profile_perindo' => $profile_perindo]);
})->name('partai.perindo');

Route::get('/partai/pks', function () {
    $profile_pks = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Keadilan Sejahtera (PKS)')
                    ->first();
    return view('partai.pks', ['image' => 'image_8.png', 'profile_pks' => $profile_pks]);
})->name('partai.pks');

Route::get('/partai/pkb', function () {
    $profile_pkb = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Kebangkitan Bangsa (PKB)')
                    ->first();
    return view('partai.pkb', ['image' => 'image_1.png', 'profile_pkb' => $profile_pkb]);
})->name('partai.pkb');

Route::get('/partai/pkn', function () {
    $profile_pkn = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Kebangkitan Nusantara (PKN)')
                    ->first();
    return view('partai.pkn', ['image' => 'image_9.png', 'profile_pkn' => $profile_pkn]);
})->name('partai.pkn');

Route::get('/partai/ppp', function () {
    $profile_ppp = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Persatuan Pembangunan (PPP)')
                    ->first();
    return view('partai.ppp', ['image' => 'image_17.png', 'profile_ppp' => $profile_ppp]);
})->name('partai.ppp');

Route::get('/partai/gelora', function () {
    $profile_gelora = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Gelombang Rakyat Indonesia (Gelora)')
                    ->first();
    return view('partai.gelora', ['image' => 'image_7.png', 'profile_gelora' => $profile_gelora]);
})->name('partai.gelora');

Route::get('/partai/pbb', function () {
    $profile_pbb = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Bulan Bintang (PBB)')
                    ->first();
    return view('partai.pbb', ['image' => 'image_13.png', 'profile_pbb' => $profile_pbb]);
})->name('partai.pbb');

Route::get('/partai/hanura', function () {
    $profile_hanura = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Hati Nurani Rakyat (Hanura)')
                    ->first();
    return view('partai.hanura', ['image' => 'image_10.png', 'profile_hanura' => $profile_hanura]);
})->name('partai.hanura');

Route::get('/partai/pu', function () {
    $profile_pu = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Ummat')
                    ->first();
    return view('partai.pu', ['image' => 'image_18.png', 'profile_pu' => $profile_pu]);
})->name('partai.pu');

Route::get('/partai/Dropdown', function () {
    $profile_PAN = DB::table('profile_partai')
                    ->where('nama_partai', 'Partai Amanat Nasional (PAN)')
                    ->first();

    return view('partai.PAN', ['image' => 'image_12.png', 'profile_PAN' => $profile_PAN]);
})->name('partai.PAN');