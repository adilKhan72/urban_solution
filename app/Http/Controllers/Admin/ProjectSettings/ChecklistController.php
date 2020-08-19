<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class ChecklistController extends Controller
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
        Return view('admin_dashboard.project_setting.tasks.checklist');
    }

    public function fetchchecklistdatatable()
    {
        $checklists =  DB::table('checklists')->select('id','name','discription')->get();

        return Datatables::of($checklists)

        ->addColumn('action', function ($checklists) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editchecklistmodal" data-id="'.$checklists->id.'" id="'.$checklists->id.'" title="Edit This checklist"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletechecklistmodal" style="color:#c82333" id="'.$checklists->id.'" title="Delete This checklist" data-id="'.$checklists->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
        
        try {

            DB::table('checklists')->insert(
                ['name' => $request->name,'discription' => $request->discription, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Skill checklist Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New checklist Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

        //dd($request->all());
    }

    public function fetch(Request $request)
    {

        $skill = DB::table('checklists')->where('id',$request->checklist_id)->select('id','name','discription')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
            try {
                DB::table('checklists')->where('id', $request->custId)->update(
                    ['name' => $request->name, 'discription' => $request->discription, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'checklists Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'checklists Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function delete(Request $request)
    {
       // dd($request->all());
       
       try { 
                DB::table('checklists')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'checklist Deleted Successfully');
        $arr = array('msg' => 'checklist Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }



}
