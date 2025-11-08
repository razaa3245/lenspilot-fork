<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'shopkeeper',         // Set role as shopkeeper
            'is_approved' => false,         // Require admin approval
        ]);

        // You can skip auto-login, or show a pending message instead of logging in
        // Auth::login($user); 

        // Show a "pending approval" page or redirect with a flash message
        return redirect()->route('login')->with('success', 'Registration successful! Your account is pending admin approval.');
    }
}
