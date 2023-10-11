<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Add this line

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'auth.admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Delete User
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

// Use the default LoginController for login page
Auth::routes(); // This automatically sets up login, registration, and other authentication routes.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
