<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        // Check if the user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Email atau kata sandi salah.']);
        }

        if (Auth::attempt($credentials)) {
            // Check the role of the logged-in user
            if ($user->role === 'AdminChat') {
                return redirect()->route('dashboard.adminchat');
            } elseif ($user->role === 'SuperAdmin') {
                return redirect()->route('dashboard.superadmin');
            } else {
                // For regular users, send them to chatroom
                return redirect()->route('chatroom.user');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Email atau kata sandi salah.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // Menghapus session yang tersisa
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login');
        }
}
