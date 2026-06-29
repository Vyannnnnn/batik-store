<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah username adalah admin
        if (Auth::user()->username !== 'admin') {
            abort(403, 'Unauthorized access. Hanya admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}