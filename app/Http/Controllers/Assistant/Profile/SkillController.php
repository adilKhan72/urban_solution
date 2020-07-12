<?php

namespace App\Http\Controllers\Assistant\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use App\Skill;
use App\User;
use App\SkillUser;
use Carbon\Carbon;
use DataTables;

class SkillController extends Controller
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
        return view('assistant_dashboard.profile.skills.index');

    }
    public function getDataTable(){

        $skills =  DB::table('skill_user')->where('user_id',Auth::user()->id)->select('skill_user.*', 'skills.title')->join('skills', 'skill_user.skill_id', '=', 'skills.id')->get();

        return Datatables::of($skills)
        ->addColumn('created_at', function ($skills) {

            $date = Carbon::parse($skills->created_at);

            $elapsed = $date->diffForHumans(Carbon::now());

            $html = '<i class="fas fa-clock" style="padding-right:5px"></i>'. $elapsed ;

            return $html;  

        })  
        ->addColumn('action', function ($skills) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editskillmodal" data-id="'.$skills->id.'" id="'.$skills->id.'" title="Edit This Skill"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteskillmodal" style="color:#c82333" id="'.$skills->id.'" title="Delete This Skill" data-id="'.$skills->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['created_at','action'])
        ->make(true);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'bail|required',
            'profeciency' => 'bail|required',
            ]);
            try {
                $skillid = DB::table('skill_user')->where('id', $request->custId)->first();
                $skill_id = DB::table('skill_user')->where('id', $request->custId)->update(
                    ['profeciency' => $request->profeciency, 'updated_at' => Carbon::now(),]
                );
                DB::table('skills')->where('id', $skillid->skill_id)->update(
                    [  'title' => $request->title, 'updated_at' => Carbon::now(),]
                );
                $arr = array('msg' => 'Skill Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Skill Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function fetch(Request $request)
    {

        $skill = DB::table('skill_user')->where('skill_user.id',$request->skill_id)->select('skill_user.*', 'skills.title')->join('skills', 'skill_user.skill_id', '=', 'skills.id')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required',
            'profeciency' => 'bail|required',
            ]);
        
        try {

            $skill_id = DB::table('skills')->insertGetId(
                ['title' => $request->title, 'created_at' => Carbon::now(),]
            );

            DB::table('skill_user')->insert(
                ['user_id' => Auth::user()->id, 'skill_id' => $skill_id, 'profeciency' => $request->profeciency, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Skill Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Skill Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

        //dd($request->all());
    }

    public function delete(Request $request)
    {
       // dd($request->all());
       
       try { 
                $skillid = DB::table('skill_user')->where('id', $request->id)->first();
                DB::table('skill_user')->delete($request->id);
                DB::table('skills')->delete($skillid->skill_id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
