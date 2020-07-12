<?php

namespace App\Http\Controllers\Assistant\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\UserPersonalProject;
use Validator,Redirect,Response;
use App\Skill;
use App\User;
use App\UserInformation;
use Carbon\Carbon;

class ProjectController extends Controller
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
        $projects = UserPersonalProject::where('user_id',Auth::user()->id)->get();
        return view('assistant_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function fetch(Request $request)
    {
        $project = DB::table('user_personal_projects')->where('id', $request->project_id)->first();

        $string1 = str_replace('"',"",$project->address);
                  $string2 = str_replace('[',"",$string1);
                  $string3 = str_replace(']',"",$string2);

        $project->address = $string3;

        $arr = array('data' => $project, 'status' => true);
        return Response()->json($arr);
    }
    public function edit(Request $request)
    {
                //dd($request->all());
                $Date = Carbon::createFromDate(2020);
                $validatedData = $request->validate([
                    'project_name' => 'required',
                    'client_name' => 'required',
                    'started' => 'required|date|before:'.$Date,
                    'ended' => 'required|date|before:'.$Date,
                    'description' => 'required|regex:/[^A-Za-z0-9]/',
                    'address' => 'required|regex:/^\s*(?:[a-zA-Z0-9_ .]+\s*,\s*){4}(?:[a-zA-Z0-9_ .]+\s*)$/',
                    ]);
        
                    $address_arr = json_encode(explode(",",$request->address));
                    // $secondary_address_arr = json_encode(explode(",",$request->secondary_address));
                    // $google_location_pin_arr = json_encode($request->google_location_pin);
        
                    try { 
        
                        DB::table('user_personal_projects')
                        ->where('id', $request->project_id)
                        ->update(['user_id' => Auth::user()->id,'project_name' => $request->project_name, 'client_name' => $request->client_name, 'started' => $request->started, 'ended' => $request->ended, 'description' => $request->description, 'address' => $address_arr,'updated_at' => Carbon::now(),]);
                        

        
        
        
                        $arr = array('msg' => 'Project Updated Successfully', 'status' => true);
                        $request->session()->flash('form_success', 'Project Updated Successfully');
        
                    } catch(\Illuminate\Database\QueryException $ex){ 
                        $arr = array('msg' => $ex->getMessage(), 'status' => false);
                    }
        
                    return Response()->json($arr);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $Date = Carbon::createFromDate(2020);
        $validatedData = $request->validate([
            'project_name' => 'required',
            'client_name' => 'required',
            'started' => 'required|date|before:'.$Date,
            'ended' => 'required|date|before:'.$Date,
            'description' => 'required|regex:/[^A-Za-z0-9]/',
            'address' => 'required|regex:/^\s*(?:[a-zA-Z0-9_ .]+\s*,\s*){4}(?:[a-zA-Z0-9_ .]+\s*)$/',
            ]);

            $address_arr = json_encode(explode(",",$request->address));
            // $secondary_address_arr = json_encode(explode(",",$request->secondary_address));
            // $google_location_pin_arr = json_encode($request->google_location_pin);

            try { 

                // DB::table('projects')
                // ->where('user_id', Auth::user()->id)
                // ->update(['city_id' => $request->city_id,'country_id' => $request->country_id,'primary_address' => $primary_address_arr,'secondary_address' => $secondary_address_arr,'google_location_pin' => $google_location_pin_arr,]);
                

                DB::table('user_personal_projects')->insert(
                    ['user_id' => Auth::user()->id,'project_name' => $request->project_name, 'client_name' => $request->client_name, 'started' => $request->started, 'ended' => $request->ended, 'description' => $request->description, 'address' => $address_arr,'created_at' => Carbon::now(),]
                );



                $arr = array('msg' => 'New Project Added Successfully', 'status' => true);
                $request->session()->flash('form_success', 'New Project Added Successfully');

            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }

            return Response()->json($arr);

        // $projects = User::where('id',Auth::user()->id)->get();
        // return view('assistant_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function delete(Request $request)
    {
        DB::table('user_personal_projects')->delete($request->id);
        $request->session()->flash('project_deleted', 'Project Deleted Successfully');
        $arr = array('msg' => 'Project Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }

}
