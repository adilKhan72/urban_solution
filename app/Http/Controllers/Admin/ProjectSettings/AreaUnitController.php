<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class AreaUnitController extends Controller
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
        $unit_for_areas =  DB::table('unit_for_areas')->select('id','unit_type', 'area_in_feet')->get();

        return Datatables::of($unit_for_areas)

        ->addColumn('action', function ($unit_for_areas) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editareaunitmodal" data-id="'.$unit_for_areas->id.'" id="'.$unit_for_areas->id.'" title="Edit This areaunit"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteareaunitmodal" style="color:#c82333" id="'.$unit_for_areas->id.'" title="Delete This areaunit" data-id="'.$unit_for_areas->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'area_in_feet' => 'bail|required',
            'unit_type' => 'bail|required',
            ]);
            try {
                DB::table('unit_for_areas')->where('id', $request->custId)->update(
                    ['area_in_feet' => $request->area_in_feet,'unit_type' => $request->unit_type, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'Unit Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Unit Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function fetch(Request $request)
    {

        $unit = DB::table('unit_for_areas')->where('id',$request->areaunit_id)->select('id','unit_type', 'area_in_feet')->first();
        $arr = array('data' => $unit, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area_in_feet' => 'bail|required',
            'unit_type' => 'bail|required',
            ]);
        
        try {

            DB::table('unit_for_areas')->insert(
                ['area_in_feet' => $request->area_in_feet,'unit_type' => $request->unit_type, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Unit Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Unit Added Successfully');
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
                DB::table('unit_for_areas')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('Unit_deleted', 'Unit Deleted Successfully');
        $arr = array('msg' => 'Unit Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
