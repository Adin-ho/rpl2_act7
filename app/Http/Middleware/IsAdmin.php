<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Pastikan user login dan role === 'admin'
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Jika belum login, redirect ke halaman login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika bukan admin, abort 403 atau redirect sesuai kebijakan
        if ($user->role !== 'admin') {
            // Pilih salah satu: abort(403) atau redirect ke home dengan pesan
            // return abort(403, 'Unauthorized.');
            return redirect()->route('home')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
