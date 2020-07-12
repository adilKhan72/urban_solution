<?php

namespace App\Http\Controllers\Admin\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use App\Skill;
use App\User;
use App\UserInformation;
use App\Role;
use App\BloodGroup;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
        
        return view('admin_dashboard.users.index');
    }

    public function getDataTable(){

        //dd(Auth::user()->id);

        $array_user =  User::with('roles')->get();
        
        //dd($array_user);

        return Datatables::of($array_user)

        ->addColumn('name', function ($array_user) {


            $html = $array_user->first_name." ".$array_user->last_name;

            return $html;  

        }) 
        ->addColumn('dates', function ($array_user) {

            if($array_user->leaving_date != null || $array_user->leaving_date != ''){
                $html = 'From->'.$array_user->joining_date ." To->".$array_user->leaving_date;
            }else{
                $html = 'From->'.$array_user->joining_date;
            }
            
            return $html;  

        }) 


        ->addColumn('role', function ($array_user) {
            $html = $array_user->roles[0]->display_name;
            return $html;  

        }) 
        ->addColumn('created_at', function ($array_user) {

            $date = Carbon::parse($array_user->created_at);

            $elapsed = $date->diffForHumans(Carbon::now());

            $html = $elapsed ;

            return $html;  

        })   
        ->addColumn('action', function ($array_user) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editusermodal" data-id="'.$array_user->id.'" id="'.$array_user->id.'" title="Edit This Skill"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteusermodal" style="color:#c82333" id="'.$array_user->id.'" title="Delete This Skill" data-id="'.$array_user->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['created_at','action'])
        ->make(true);
    }



    public function fetch(Request $request)
    {

        $user = User::where('id',$request->user_id)->with('roles')->first();
        $arr = array('data' => $user, 'status' => true);
        return Response()->json($arr);
    }


    public function edit(Request $request)
    {
        $Date = Carbon::createFromDate();
        $validatedData = $request->validate([
            'first_name' => 'bail|alpha|required',
            'last_name' => 'bail|alpha|required',
            'designation' => 'bail|required',
            'email' => 'bail|required|unique:users,email,'.$request->custId.',id',
            'joining_date' => 'bail|required|before:'.$Date,
            'status' => 'bail|required',
            'role' => 'bail|required',
            ]);

            try {



                $role = DB::table('roles')->where('display_name', $request->role)->first();

                DB::table('role_user')->where('user_id', $request->custId)->update(
                    ['role_id' => $role->id, 'updated_at' => Carbon::now(),]
                );

                DB::table('users')->where('id', $request->custId)->update([                
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'designation' => $request->designation,
                    'email' => $request->email,
                    'joining_date' => $request->joining_date,
                    'leaving_date' => $request->leaving_date,
                    'status' => $request->status,
                    'updated_at' => Carbon::now(),
                    ]);

                $arr = array('msg' => 'User Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'User Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
            return Response()->json($arr);
    }

    public function store(Request $request)
    {
        $Date = Carbon::createFromDate();
        $validatedData = $request->validate([
            'first_name' => 'bail|alpha|required',
            'last_name' => 'bail|alpha|required',
            'designation' => 'bail|required',
            'email' => 'bail|required|unique:users',
            'joining_date' => 'bail|required|before:'.$Date,
            'status' => 'bail|required',
            'role' => 'bail|required',
            'password' => 'bail|required|string|min:8|confirmed',
            ]);

        try {

            

            $user_id = DB::table('users')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'email' => $request->email,
                'joining_date' => $request->joining_date,
                'leaving_date' => $request->leaving_date,
                'employee_number' => $request->leaving_date,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
            ]);

            $employee_number = '00'.$user_id.'_'.strtotime($request->joining_date);

            DB::table('users')->where('id', $user_id)->update(
                ['employee_number' => $employee_number,]
            );

            DB::table('user_information')->insert(['user_id' => $user_id]);

            $role = DB::table('roles')->where('display_name', $request->role)->first();
            
            DB::table('role_user')->insert([
                'role_id' => $role->id,
                'user_id' => $user_id,
            ]);

            $arr = array('msg' => 'New User Added Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New User Added Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }

        return Response()->json($arr);

    }

    public function delete(Request $request)
    {
       //dd($request->all());
       
       try { 
                $role_user = DB::table('role_user')->where('user_id', $request->id)->first();

                //dd($role_user);
                DB::table('role_user')->delete($role_user->id);

                DB::table('users')->delete($request->id);

            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'User Deleted Successfully');
        $arr = array('msg' => 'User Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
