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

class ServicesController extends Controller
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
    public function fetchServiceDataTable(Request $request)
    {
        $services =  DB::table('services')->select('id','name','discription')->get();

        return Datatables::of($services)
        ->addColumn('action', function ($services) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editservicemodal" data-id="'.$services->id.'" id="'.$services->id.'" title="Edit This service"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteservicemodal" style="color:#c82333" id="'.$services->id.'" title="Delete This service" data-id="'.$services->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
        
        try {

            DB::table('services')->insert(
                ['name' => $request->name,'discription' => $request->discription,  'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New service Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New service Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);
    }



    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'discription' => 'bail|required',
            ]);
            try {
                DB::table('services')->where('id', $request->custId)->update(
                    ['name' => $request->name, 'discription' => $request->discription, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'service Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'service Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }






    public function delete(Request $request)
    {
       
       try { 
                DB::table('services')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Service Deleted Successfully');
        $arr = array('msg' => 'Service Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }


    public function fetch(Request $request)
    {

        $service = DB::table('services')->where('id',$request->service_id)->select('id','name','discription')->first();
        $arr = array('data' => $service, 'status' => true);
        return Response()->json($arr);
    }

}
