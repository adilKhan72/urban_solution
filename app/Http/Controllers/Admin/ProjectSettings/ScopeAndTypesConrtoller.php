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
use App\ScopeOfProjectSubtype;

class ScopeAndTypesConrtoller extends Controller
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
        Return view('admin_dashboard.project_setting.scope_services.types_scopes');
    }

    public function fetchScopeDataTable(Request $request)
    {
        $scope_of_projects =  DB::table('scope_of_projects')->select('id','name')->get();

        return Datatables::of($scope_of_projects)


        ->addColumn('action', function ($scope_of_projects) {

            $html = ' <i class="fa fa-plus " data-toggle="modal" data-target="#createscopesubtypemodal" style="color:#389948; padding-right:8px" id="'.$scope_of_projects->id.'_subtype" title="Add Scope sub Types to this Scope" data-id="'.$scope_of_projects->id.'"></i>';

            $html .= '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editscopemodal" data-id="'.$scope_of_projects->id.'_subtype" id="'.$scope_of_projects->id.'" title="Edit This scope"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletescopemodal" style="color:#c82333" id="'.$scope_of_projects->id.'" title="Delete This scope" data-id="'.$scope_of_projects->id.'"></i>';

            
            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function fetchScopeSubtypeDataTable(Request $request)
    {
        
        $scope_of_projects = ScopeOfProjectSubtype::with(['scopeofproject'])->get();
        return Datatables::of($scope_of_projects)


        ->addColumn('action', function ($scope_of_projects) {


            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editscopesubtypemodal" data-id="'.$scope_of_projects->id.'_subtype" id="'.$scope_of_projects->id.'" title="Edit This scope"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletescopesubtypemodal" style="color:#c82333" id="'.$scope_of_projects->id.'" title="Delete This scope" data-id="'.$scope_of_projects->id.'"></i>';

            
            return $html;  

        })
        ->addColumn('parent_scope', function ($scope_of_projects) {

            $html = $scope_of_projects->scopeofproject->name;
            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',

            ]);
            try {
                DB::table('scope_of_projects')->where('id', $request->custId)->update(
                    ['name' => $request->name,'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'Scope Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Scope Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function editSubType(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
            try {
                DB::table('scope_of_project_subtypes')->where('id', $request->custId)->update(
                    ['name' => $request->name,'discription' => $request->discription,'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'Scope Sub Type Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Scope Sub Type Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'bail|required',
            ]);
        
        try {

            DB::table('scope_of_projects')->insert(
                ['name' => $request->name, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Scope Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Scope Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);
    }


    public function storeSubTypes(Request $request){
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
        
        try {

            DB::table('scope_of_project_subtypes')->insert(
                ['scope_of_project_id' => $request->custId, 'name' => $request->name,'discription' => $request->discription, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Scope Sub Type Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Scope Sub Type Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);
    }


    public function fetch(Request $request)
    {

        $scope_of_projects = DB::table('scope_of_projects')->where('id',$request->scope_id)->select('id','name')->first();
        $arr = array('data' => $scope_of_projects, 'status' => true);
        return Response()->json($arr);
    }

    public function fetchSubType(Request $request)
    {

        $scope_of_projects = DB::table('scope_of_project_subtypes')->where('id',$request->scopesubtype_id)->select('id','name','discription')->first();
        $arr = array('data' => $scope_of_projects, 'status' => true);
        return Response()->json($arr);
    }


    public function delete(Request $request)
    {
       // dd($request->all());
       
       try { 
                DB::table('scope_of_project_subtypes')->where('scope_of_project_id', $request->id)->delete();
                DB::table('scope_of_projects')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

    public function deleteSubType(Request $request)
    {
       // dd($request->all());
       
       try { 
                DB::table('scope_of_project_subtypes')->delete($request->id);

            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }
}
