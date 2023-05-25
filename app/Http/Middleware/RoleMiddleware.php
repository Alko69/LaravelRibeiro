<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && $request->user()->role === $role) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirect to login or any other route
    }
}

