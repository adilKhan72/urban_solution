<?php

namespace App\Http\Controllers\Assistant\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Skill;
use App\User;
use App\BloodGroup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Auth::user()->id);
        //$user = User::where('id',Auth::user()->id)->with(['roles','skills','userinformation','userqualification.educationaldegree'])->first();
        //dd($user);
        //this returns to home view after successfully login.
        return view('assistant_dashboard.profile.index');
    }

    

}
