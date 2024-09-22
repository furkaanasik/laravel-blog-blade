<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Register
        $user = User::create($fields);

        // Login
        Auth::login(user: $user);

        // Redirect
        return redirect()->route('home');
    }

    // Login user
    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        // Try to login
        if (!Auth::attempt($fields, $request->remember)) {
            // Show error
            return back()->withErrors([
                'failed' => 'Invalid credentials',
            ]);
        }

        // Redirect
        return redirect()->intended('dashboard');
    }

    // Logout user
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate csrf token
        $request->session()->regenerateToken();


        // Redirect
        return redirect('/');
    }
}
