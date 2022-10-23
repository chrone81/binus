<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// Use User Model
use App\Models\User;

class ManagerMiddleware
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
        // Filter only Manager role could access the manager page
        if ($request->User()->role == User::ROLE_MANAGER) {
            return $next($request);
        }
    
        // Throw unauthorized page if role is not manager
        abort(401);
    }
}
