<?php

namespace App\Http\Controllers\Admin\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Skill;
use App\User;
use App\BloodGroup;

class InformationController extends Controller
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
        $bloodgroups = DB::table('blood_groups')->get();

        $user = User::where('id',Auth::user()->id)->with(['roles','userinformation.city','userinformation.country','userinformation.bloodgroup'])->first();
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        //dd($user);
        return view('admin_dashboard.profile.informations.index',['user'=>$user]);
    }
    public function Store(Request $request)
    {
        
        return view('admin_dashboard.profile.informations.index');
    }

   

}
