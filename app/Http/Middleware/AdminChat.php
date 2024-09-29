<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminChat
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'AdminChat') {
            return $next($request);  // Izinkan akses jika user adalah AdminChat
        }

        return redirect('/');  // Jika bukan AdminChat, arahkan kembali ke home
    }
}
