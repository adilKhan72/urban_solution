<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class MouzasController extends Controller
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
        $mouzas =  DB::table('mouzas')->select('id','name', 'area')->get();

        return Datatables::of($mouzas)

        ->addColumn('action', function ($mouzas) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editmouzamodal" data-id="'.$mouzas->id.'" id="'.$mouzas->id.'" title="Edit This mouza"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletemouzamodal" style="color:#c82333" id="'.$mouzas->id.'" title="Delete This mouza" data-id="'.$mouzas->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'area' => 'bail|required',
            ]);
            try {
                DB::table('mouzas')->where('id', $request->custId)->update(
                    ['name' => $request->name,'area' => $request->area,  'updated_at' => Carbon::now(),]
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

        $skill = DB::table('mouzas')->where('id',$request->mouza_id)->select('id','name', 'area')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'area' => 'bail|required',
            ]);
        
        try {

            DB::table('mouzas')->insert(
                ['name' => $request->name,'area' => $request->area,  'created_at' => Carbon::now(),]
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
                DB::table('mouzas')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
