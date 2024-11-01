<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view('auth.login-admin');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check the role of the authenticated user
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Redirect to admin dashboard if the user is an admin
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } else {
                // Redirect to home if the user is not an admin
                return redirect()->route('home')->with('success', 'Login successful');
            }
        }

        // If authentication fails, return back with an error
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->withInput();
    }
}
