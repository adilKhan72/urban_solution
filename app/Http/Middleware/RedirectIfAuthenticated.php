<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
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

            $user_role = Auth::user()->roles->pluck('display_name');
            if ($user_role->contains('admin')) {
                return redirect()->route('admin_dashboard');
            }elseif($user_role->contains('principals')){
                return redirect()->route('principal_dashboard');
            }elseif($user_role->contains('assistants')){
                return redirect()->route('assistant_dashboard');
            }else{
                echo "not a roled user logged in";
            }
        }

        return $next($request);
    }
}
