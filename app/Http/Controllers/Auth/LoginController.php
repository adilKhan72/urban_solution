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
		if ($user_role->contains('admin') && $user->status == 'active') {
			return redirect()->route('admindashboard.index');
		}elseif($user_role->contains('principals') && $user->status == 'active'){
            return redirect()->route('principaldashboard.index');
        }elseif($user_role->contains('assistants') && $user->status == 'active'){
            return redirect()->route('assistantdashboard.index');
        }else{
            $this->performLogOut($request);
            $request->session()->flash('no_role_sign_in', "For signing in a role must be defined and Must be of Status Active Account. Not an Active Account OR No role Assigned.");
            return redirect()->route('main_home_page_login'); 
        }

    }
    
    
}
