<?php

namespace App\Http\Controllers\Admin\Profile;
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

class EmergencyContactController extends Controller
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
        return view('admin_dashboard.profile.emergency_contacts.index');

    }
    public function getDataTable(){

        $emergency_contact =  DB::table('user_emergency_contacts')->where('user_id',Auth::user()->id)->get();

        return Datatables::of($emergency_contact)
        ->addColumn('created_at', function ($emergency_contact) {

            $date = Carbon::parse($emergency_contact->created_at);

            $elapsed = $date->diffForHumans(Carbon::now());

            $html = '<i class="fas fa-clock" style="padding-right:5px"></i>'. $elapsed ;

            return $html;  

        })  
        ->addColumn('action', function ($emergency_contact) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editemergency_contactmodal" data-id="'.$emergency_contact->id.'" id="'.$emergency_contact->id.'" title="Edit This Emergency Contact"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteemergency_contactmodal" style="color:#c82333" id="'.$emergency_contact->id.'" title="Delete This Emergency Contact" data-id="'.$emergency_contact->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['created_at','action'])
        ->make(true);
    }

    public function edit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'relation' => 'bail|required',
            'phone' => 'bail|required',
            ]);
            try {

                DB::table('user_emergency_contacts')->where('id', $request->custId)->update(
                    ['user_id' => Auth::user()->id, 'name' => $request->name, 'relation' => $request->relation,'phone' => $request->phone, 'updated_at' => Carbon::now(),]
                );

                $arr = array('msg' => 'Emergency Contact Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Emergency Contact Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function fetch(Request $request)
    {

        $skill = DB::table('user_emergency_contacts')->where('id',$request->emergency_contact_id)->first();
        $arr = array('data' => $skill, 'status' => true);
        return Response()->json($arr);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required',
            'relation' => 'bail|required',
            'phone' => 'bail|required',
            ]);
        //dd($request->all());
        try {


            DB::table('user_emergency_contacts')->insert(
                ['user_id' => Auth::user()->id, 'name' => $request->name, 'relation' => $request->relation,'phone' => $request->phone, 'created_at' => Carbon::now(),]
            );

            $arr = array('msg' => 'New Emergency Contact Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Emergency Contact Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

        //dd($request->all());
    }

    public function delete(Request $request)
    {

       try { 
                DB::table('user_emergency_contacts')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'Emergency Contact Deleted Successfully');
        $arr = array('msg' => 'Emergency Contact Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
