<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class ZonesController extends Controller
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
        $zones =  DB::table('zones')->select('id','name')->get();

        return Datatables::of($zones)

        ->addColumn('action', function ($zones) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editzonemodal" data-id="'.$zones->id.'" id="'.$zones->id.'" title="Edit This zone"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletezonemodal" style="color:#c82333" id="'.$zones->id.'" title="Delete This zone" data-id="'.$zones->id.'"></i>';

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
                DB::table('zones')->where('id', $request->custId)->update(
                    ['name' => $request->name, 'updated_at' => Carbon::now(),]
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

        $skill = DB::table('zones')->where('id',$request->zone_id)->select('id','name')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required',
            ]);
        
        try {

            DB::table('zones')->insert(
                ['name' => $request->name, 'created_at' => Carbon::now(),]
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
                DB::table('zones')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
