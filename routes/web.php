<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilePartaiController;
use App\Http\Controllers\ProfileController;

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

Route::get('/partai_all', function () {
    return view('partai_all');
})->name('partai_all');

Route::get('/kasus_viz', function () {
    return view('kasus_viz');
})->name('kasus_viz');

Route::get('/vote', function () {
    return view('vote');
})->name('vote');

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');
Route::post('/feedback', 'App\Http\Controllers\FeedbackController@store')->name('store.feedback');


//  PARTAIS //
Route::get('/partai/pdip', function () {
    return view('partai.pdip', ['image' => 'image_3.png']);
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
