<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\MailSend;

class SignupController extends Controller
{
    // Show signup form
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    
    // Handle user registration
    public function actionregister(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Generate a random string for email verification
        $verificationKey = Str::random(100);

        // Create the user, but set email_verified_at to NULL initially
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role to 'user'
            'google_id' => md5($request->email), // Generate google_id
            'google_token' => $verificationKey, // Store the verification key here instead
            'email_verified_at' => null, // Set to null initially
        ]);

        // Email details to send
        $details = [
            'name' => $request->name,
            'website' => 'woodmood.id',
            'datetime' => now()->toDateTimeString(),
            'url' => url('/register/verify/'.$verificationKey) // Use the verification key in the URL
        ];

        // Send the verification email
        Mail::to($request->email)->send(new MailSend($details));

        // Flash a message and redirect
        Session::flash('message', 'Link verifikasi telah dikirim ke Email Anda. Silahkan cek email Anda untuk mengaktifkan akun.');
        return redirect()->route('signup');
    }

    // Verify the email and update email_verified_at with a timestamp
    public function verify($verificationKey)
    {
        // Find the user by the verification key stored in google_token
        $user = User::where('google_token', $verificationKey)->first();

        if ($user) {
            // Update email_verified_at to the current timestamp (now) to mark as verified
            $user->update([
                'email_verified_at' => now(),
                'active' => 1,
            ]);

            // Redirect to the login page with success message
            return redirect()->route('login')->with('message', 'Verifikasi Berhasil. Akun Anda sudah aktif.');
        } else {
            // Redirect to the login page with error message if the key is invalid
            return redirect()->route('login')->with('error', 'Key tidak valid!');
        }
    }
}
