<?php

namespace App\Http\Controllers\Admin\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;
use App\RequirementType;

class NewProjectController extends Controller
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
        Return view('admin_dashboard.project.index');
    }
    public function newProject()
    {
        Return view('admin_dashboard.project.newproject.index');
    }

    public function FetchReqDetailsById(Request $request)
    {
        $requirementtype = RequirementType::where('id',$request->requirements_performa_id)->with('requirementcustomfield')->get();
        //dd($requirementtype);
        $arr = array('data' => $requirementtype, 'status' => true);
        return Response()->json($arr);
    }

}
