<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class ClientsController extends Controller
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
        $clients_contact_users =  DB::table('clients_contact_users')->select('id','phone','name','email','designation','secondary_phone', 'address')->get();

        return Datatables::of($clients_contact_users)

        ->addColumn('action', function ($clients_contact_users) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editclientmodal" data-id="'.$clients_contact_users->id.'" id="'.$clients_contact_users->id.'" title="Edit This client"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteclientmodal" style="color:#c82333" id="'.$clients_contact_users->id.'" title="Delete This client" data-id="'.$clients_contact_users->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'name' => 'bail|required',
            'designation' => 'bail|required',
            'secondary_phone' => 'bail|required',
            'address' => 'bail|required',
            ]);
            try {
                DB::table('clients_contact_users')->where('id', $request->custId)->update(
                    ['phone' => $request->phone,'email' => $request->email,'name' => $request->name,'designation' => $request->designation,'secondary_phone' => $request->secondary_phone, 'address' => $request->address,  'updated_at' => Carbon::now(),]
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

        $skill = DB::table('clients_contact_users')->where('id',$request->client_id)->select('id','phone','name', 'email','designation','secondary_phone', 'address')->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'name' => 'bail|required',
            'designation' => 'bail|required',
            'secondary_phone' => 'bail|required',
            'address' => 'bail|required',
            ]);
        
        try {

            DB::table('clients_contact_users')->insert(
                ['phone' => $request->phone,'email' => $request->email,'name' => $request->name,'designation' => $request->designation,'secondary_phone' => $request->secondary_phone, 'address' => $request->address,  'created_at' => Carbon::now(),]
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
                DB::table('clients_contact_users')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Skill Deleted Successfully');
        $arr = array('msg' => 'Skill Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }


}
