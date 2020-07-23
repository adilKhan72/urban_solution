<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class RequirementsController extends Controller
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
        Return view('admin_dashboard.project_setting.requirements.types_details');
    }

    public function fetchReqTypeDataTable(Request $request)
    {
        $requirement_types =  DB::table('requirement_types')->select('id','type', 'discription')->get();

        return Datatables::of($requirement_types)

        ->addColumn('action', function ($requirement_types) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editrequirementtypemodal" data-id="'.$requirement_types->id.'" id="'.$requirement_types->id.'" title="Edit This requirementtype"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleterequirementtypemodal" style="color:#c82333" id="'.$requirement_types->id.'" title="Delete This requirementtype" data-id="'.$requirement_types->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function requirementTypeStore(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'bail|required',
            'discription' => 'bail|required',
            ]);
        
        try {

            DB::table('requirement_types')->insert(
                ['type' => $request->type, 'discription' => $request->discription,'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Requirement Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Requirement Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

        //dd($request->all());
    }

    public function requirementTypeDelete(Request $request)
    {
       
       try { 

        $requirement_typesid = DB::table('requirement_types')->where('id', $request->id)->first();
        DB::table('requirement_types')->delete($request->id);
        DB::table('requirement_custom_fields')->where('requirement_type_id', $requirement_typesid->id)->delete();
        } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Requirement Type Deleted Successfully');
        $arr = array('msg' => 'Requirement Type Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
