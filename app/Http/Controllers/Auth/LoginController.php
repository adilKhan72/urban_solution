<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request as REQ;
use Session, Request, Helper;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers { logout as performLogOut; }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        $current_url = Request::path();
		return view('auth.login');
    }
    
    protected function authenticated($request, $user) {
        
        $user_role = $user->roles->pluck('display_name');
		if ($user_role->contains('admin')) {
			return redirect()->route('admin_dashboard');
		}elseif($user_role->contains('principals')){
            return redirect()->route('principal_dashboard');
        }elseif($user_role->contains('assistants')){
            return redirect()->route('assistant_dashboard');
        }else{
            $this->performLogOut($request);
            $request->session()->flash('no_role_sign_in', "For signing in a role must be defined. No roles found in these list 'admin, principals, assistants'. May be Unfamiliar OR No role Assigned.");
            return redirect()->route('main_home_page_login');
        }

    }
    
    
}
