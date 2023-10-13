<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilePartaiController;

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



Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');
Route::post('/feedback', 'App\Http\Controllers\FeedbackController@store')->name('store.feedback');


//  PARTAIS //
Route::get('/partai/pdip', function () {
    return view('partai.pdip', ['image' => 'image_3.png']);
})->name('partai.pdip');
