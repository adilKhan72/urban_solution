<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPrincipal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(Auth::user()->roles->pluck('display_name'));
        $user_role = Auth::user()->roles->pluck('display_name');
        if(!$user_role->contains('principals') || Auth::user()->status != 'active'){

            if ($user_role->contains('admin') && Auth::user()->status == 'active') {
                return redirect()->route('admindashboard.index')->with('cant_access_direct', 'Cannot Access Principals Dashboard Directly!');
            }elseif($user_role->contains('assistants') && Auth::user()->status == 'active'){
                return redirect()->route('assistantdashboard.index')->with('cant_access_direct', 'Cannot Access Principals Dashboard Directly!');
            }else{
                $request->session()->flash('no_role_sign_in', "For signing in a role must be defined and Must be of Status Active Account. Not an Active Account OR No role Assigned.");
                return redirect()->route('main_home_page_login');   
            }

        }else{
        return $next($request);
        } 
    }
}
