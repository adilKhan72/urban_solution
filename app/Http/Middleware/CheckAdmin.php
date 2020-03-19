<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(!$user_role->contains('admin')){
            
            if($user_role->contains('principals')){
                return redirect()->route('principal_dashboard')->with('cant_access_direct', 'Cannot Access Admin Dashboard Directly!');;
            }elseif($user_role->contains('assistants')){
                return redirect()->route('assistant_dashboard')->with('cant_access_direct', 'Cannot Access Admin Dashboard Directly!');
            }else{
                $request->session()->flash('no_role_sign_in', "For signing in a role must be defined. No roles found in these list 'admin, principals, assistants'. May be Unfamiliar OR No role Assigned.");
                return redirect()->route('main_home_page_login');
            }

        }else{
        return $next($request);
        }
    }
}
