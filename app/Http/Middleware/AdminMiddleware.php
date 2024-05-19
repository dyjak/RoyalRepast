<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->permission === 'administrator') {
            return $next($request);
        }

        return redirect()->route('restaurants.index')->with('error', 'You do not have permission to access this page.');
    }
}
