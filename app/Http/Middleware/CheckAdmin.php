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
                return redirect()->route('principal_dashboard');
            }elseif($user_role->contains('assistants')){
                return redirect()->route('assistant_dashboard');
            }else{
                echo "For signing in a role must be defined. No roles found in these list 'admin, principals, assistants'. May be Unfamiliar OR No role Assigned.";
            }

        }else{
        return $next($request);
        }
    }
}
