<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;
use App\RequirementCustomField;

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

            $html = ' <i class="fa fa-plus " data-toggle="modal" data-target="#createsubfieldmodal" style="color:#389948; padding-right:8px" id="'.$requirement_types->id.'_subtype" title="Add Requirment sub fields to this Requirement type" data-id="'.$requirement_types->id.'"></i>';

            $html .= '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editrequirementtypemodal" data-id="'.$requirement_types->id.'_subtype" id="'.$requirement_types->id.'" title="Edit This requirementtype"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleterequirementtypemodal" style="color:#c82333" id="'.$requirement_types->id.'" title="Delete This requirementtype" data-id="'.$requirement_types->id.'"></i>';

            
            return $html;  

        })
        ->rawColumns(['action','type'])
        ->make(true);
    }


    public function fetchsubFieldDataTable(Request $request)
    {

        $requirement_custom_fields = RequirementCustomField::with(['requirementtype'])->get();  
        return Datatables::of($requirement_custom_fields)

        ->editColumn('type', function ($requirement_custom_fields) {        
            $html = $requirement_custom_fields->requirementtype->type;
            return $html;  
        })

        ->addColumn('action', function ($requirement_custom_fields) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editsubfieldmodal" data-id="'.$requirement_custom_fields->id.'_subtype" id="'.$requirement_custom_fields->id.'" title="Edit This subfield"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletesubfieldmodal" style="color:#c82333" id="'.$requirement_custom_fields->id.'" title="Delete This subfield" data-id="'.$requirement_custom_fields->id.'"></i>';
 
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

    }

    public function subFieldStore(Request $request)
    {
        $validatedData = $request->validate([
            'filed_name' => 'bail|required',
            'field_value' => 'bail|required',
            ]);
        
        try {

            DB::table('requirement_custom_fields')->insert(
                ['requirement_type_id' => $request->hiddenidsubfield, 'filed_name' => $request->filed_name, 'field_value' => $request->field_value,'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New custom_fields Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New custom_fields Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

    }

    public function requirementTypeFetch(Request $request)
    {

        $skill = DB::table('requirement_types')->where('id',$request->requirementtype_id)->select('id','type','discription')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }

    public function subFieldFetch(Request $request)
    {

        $skill = DB::table('requirement_custom_fields')->where('id',$request->subfield_id)->select('id','filed_name','field_value')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }

    public function subFieldEdit(Request $request)
    {
        $validatedData = $request->validate([
            'filed_name' => 'bail|required',
            'field_value' => 'bail|required',
            ]);
            try {
                DB::table('requirement_custom_fields')->where('id', $request->custId)->update(
                    ['filed_name' => $request->filed_name, 'field_value' => $request->field_value, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'custom_fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'custom_fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function requirementTypeEdit(Request $request)
    {
        
        $validatedData = $request->validate([
            'type' => 'bail|required',
            'discription' => 'bail|required',
            ]);
            try {
                DB::table('requirement_types')->where('id', $request->custId)->update(
                    ['type' => $request->type, 'discription' => $request->discription, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'Requirement Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Requirement Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
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

    public function subFieldDelete(Request $request)
    {
       
       try { 

        DB::table('requirement_custom_fields')->where('id', $request->id)->delete();

        } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'subfield Type Deleted Successfully');
        $arr = array('msg' => 'subfield Type Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
