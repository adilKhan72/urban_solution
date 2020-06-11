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
            if ($user_role->contains('admin') && Auth::user()->status == 'active') {
                return redirect()->route('admindashboard.index');
            }elseif($user_role->contains('principals') && Auth::user()->status == 'active'){
                return redirect()->route('principaldashboard.index');
            }elseif($user_role->contains('assistants') && Auth::user()->status == 'active'){
                return redirect()->route('assistantdashboard.index');
            }else{
                echo "Not a Roled User Logged OR Not an Active(status) Account.";
            }
        }

        return $next($request);
    }
}
