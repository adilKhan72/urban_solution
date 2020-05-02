<?php

namespace App\Http\Controllers\Admin\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\UserPersonalProject;


class ProjectController extends Controller
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
        $projects = UserPersonalProject::where('user_id',Auth::user()->id)->get();
        return view('admin_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function edit()
    {
        $projects = User::where('user_id',Auth::user()->id)->get();
        return view('admin_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function store()
    {
        $projects = User::where('user_id',Auth::user()->id)->get();
        return view('admin_dashboard.profile.projects.index',['projects'=>$projects]);
    }


}
