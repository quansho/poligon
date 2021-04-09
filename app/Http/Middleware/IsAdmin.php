<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$guard = null)
    {
        if (Auth::user() && Auth::user()->hasPermissionTo('dashboard_access')) {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
