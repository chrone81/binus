<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// Use User Model
use App\Models\User;

class AdminMiddleware
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
        // Filter only Admin role could access the admin page
        if ($request->User()->role == User::ROLE_ADMIN) {
            return $next($request);
        }
        // Throuw unauthorized page if role is not admin
        abort(401);
    }
}
