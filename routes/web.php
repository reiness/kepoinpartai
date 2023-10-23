<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

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
    return view('partai.PSI', ['image' => 'image_15.png', 'profile_PSI' => $profile_PSI]);
})->name('partai.PSI');
