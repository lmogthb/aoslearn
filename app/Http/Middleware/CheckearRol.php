<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckearRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($request->user()->rol === $role) {
            return $next($request);
        }

        abort(403);
    }
}
