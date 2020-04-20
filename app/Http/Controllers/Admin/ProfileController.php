<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Skill;
use App\User;
use App\BloodGroup;
class ProfileController extends Controller
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
        return view('admin_dashboard.profile.index');
    }

    public function Informations()
    {
        $bloodgroups = DB::table('blood_groups')->get();

        $user = User::where('id',Auth::user()->id)->with(['roles','userinformation.city','userinformation.country','userinformation.bloodgroup'])->first();
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        //dd($user);
        return view('admin_dashboard.profile.informations',['user'=>$user]);
    }
    public function InformationsStore()
    {

        return view('admin_dashboard.profile.informations');
    }

    public function Projects()
    {
        return view('admin_dashboard.profile.projects');
    }

    public function Qualitifcations()
    {
        return view('admin_dashboard.profile.qualifications');
    }

    public function Experiences()
    {
        return view('admin_dashboard.profile.experiences');
    }

    public function Skills()
    {
        return view('admin_dashboard.profile.skills');
    }

}
