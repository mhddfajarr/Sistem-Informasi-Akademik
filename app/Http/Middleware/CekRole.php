<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::User()->role == 'TU') {
            return $next($request);
        } elseif (Auth::check() && Auth::User()->role == 'Guru') {
            return $next($request);
        } elseif (Auth::check() && Auth::User()->role == 'Siswa') {
            return $next($request);
        }
        return redirect('errors.404');
    }
}
