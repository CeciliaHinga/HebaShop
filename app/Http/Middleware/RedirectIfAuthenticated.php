<?php

namespace App\Http\Middleware;

use Closure;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           return $redir_path = redirect('/');
        }
        

        return $redir_path = $next($request);
    }
}
