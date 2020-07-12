<?php

namespace App\Http\Controllers\Admin\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Skill;
use App\User;
use App\BloodGroup;
use Validator,Redirect,Response;
use App\UserInformation;
use App\UserExperience;
use Carbon\Carbon;

class ExperienceController extends Controller
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
        $experiences = UserExperience::where('user_id',Auth::user()->id)->get();
        return view('admin_dashboard.profile.experiences.index',['experiences'=>$experiences]);
    }


    public function fetch(Request $request)
    {
        $experience = UserExperience::where('id', $request->experience_id)->first();
        //dd($experience);
        $arr = array('data' => $experience, 'status' => true);
        return Response()->json($arr);
    }

    public function edit(Request $request)
    {
                
                $Date = Carbon::createFromDate();
                $validatedData = $request->validate([
                    'organisation' => 'bail|required',
                    'designation' => 'bail|required',
                    'description' => 'bail|required',
                    'from_date' => 'bail|required|date|before:'.$Date,
                    'to_date' => 'bail|required|date|before:'.$Date,
                    'experience_letter_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
                    ]);
                    //dd($request->all());
                    try { 

                        if(isset($request->experience_letter_scan)){

                            $experience = DB::table('user_experiences')
                            ->where('id', $request->custId)->first();
                            $directory = "public/user_files/multi_experience_letter_scans/".$experience->experience_letter_scan;

                            if($experience->experience_letter_scan != null){
                                Storage::delete($directory);
                            }

                            $file_name_with_ext = $request->file('experience_letter_scan')->getClientOriginalName();
                            $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                            $extension = $request->file('experience_letter_scan')->getClientOriginalExtension();
                            $name_to_store = 'experience_letter_scan_'.Auth::user()->id.'_'.rand().'.'.$extension;
                            $path = $request->file('experience_letter_scan')->storeAs('public/user_files/multi_experience_letter_scans', $name_to_store);


                        }else{
                            $experience = DB::table('user_experiences')
                            ->where('id', $request->custId)->first();
                            $name_to_store = $experience->experience_letter_scan;
                        }


        
                        DB::table('user_experiences')
                        ->where('id', $request->custId)
                        ->update(['designation' => $request->designation ,'user_id' => Auth::user()->id, 'organisation' => $request->organisation, 'description' => $request->description, 'from_date' => $request->from_date, 'to_date' => $request->to_date,  'experience_letter_scan' => $name_to_store,'created_at' => Carbon::now(),]);
                        
                        
        
        
        
                        $arr = array('msg' => 'Experience Updated Successfully', 'status' => true);
                        $request->session()->flash('form_success', 'Experience Updated Successfully');
        
                    } catch(\Illuminate\Database\QueryException $ex){ 
                        $arr = array('msg' => $ex->getMessage(), 'status' => false);
                    }
        
                    return Response()->json($arr);
    }

    public function store(Request $request)
    {
        $Date = Carbon::createFromDate();
        $validatedData = $request->validate([
            'organisation' => 'bail|required',
            'designation' => 'bail|required',
            'description' => 'bail|required',
            'from_date' => 'required|date|before:'.$Date,
            'to_date' => 'required|date|before:'.$Date,
            'experience_letter_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
            ]);
            try {
                if(isset($request->experience_letter_scan)){
                    $file_name_with_ext = $request->file('experience_letter_scan')->getClientOriginalName();
                    $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $request->file('experience_letter_scan')->getClientOriginalExtension();
                    $name_to_store = 'experience_letter_scan_'.Auth::user()->id.'_'.rand().'.'.$extension;
                    $path = $request->file('experience_letter_scan')->storeAs('public/user_files/multi_experience_letter_scans', $name_to_store);
                }else{
                    $name_to_store = null;
                }


            DB::table('user_experiences')->insert(
                ['designation' => $request->designation ,'user_id' => Auth::user()->id, 'organisation' => $request->organisation, 'description' => $request->description, 'from_date' => $request->from_date, 'to_date' => $request->to_date,  'experience_letter_scan' => $name_to_store,'created_at' => Carbon::now(),]
            );
                $arr = array('msg' => 'New Experience Added Successfully', 'status' => true);
                $request->session()->flash('form_success', 'New Experience Added Successfully');

            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }

            return Response()->json($arr);

        // $projects = User::where('id',Auth::user()->id)->get();
        // return view('admin_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function delete(Request $request)
    {
        $experience = DB::table('user_experiences')
                        ->where('id', $request->id)->first();
        $directory = "public/user_files/multi_experience_letter_scans/".$experience->experience_letter_scan;      
        if($experience->experience_letter_scan != null){
            Storage::delete($directory);
        }
        DB::table('user_experiences')->delete($request->id);

        $request->session()->flash('experience_deleted', 'Experience Deleted Successfully');
        $arr = array('msg' => 'Experience Deleted Successfully', 'status' => true );

        return Response()->json($arr);
    }

}
