<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
use App\Permission;
use App\Role;
use App\User;
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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
<<<<<<< HEAD
           return $redir_path = redirect('/');
        }
        

        return $redir_path = $next($request);
=======
            return redirect('/');
        }

        return $next($request);
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
}
