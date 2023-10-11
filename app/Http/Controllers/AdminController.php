<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // app/Http/Controllers/AdminController.php
    public function index()
    {
        $users = User::all();
        return view('admin-dashboard', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User has been deleted successfully.');
    }


    // Middleware for admin access
    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin']);
    }

}
