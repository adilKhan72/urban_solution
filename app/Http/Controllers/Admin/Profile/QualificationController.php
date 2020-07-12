<?php

namespace App\Http\Controllers\Admin\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Skill;
use App\User;
use App\BloodGroup;
use Validator,Redirect,Response;
use App\UserInformation;
use App\UserQualification;
use Carbon\Carbon;

class QualificationController  extends Controller
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
        $qualifications = UserQualification::where('user_id',Auth::user()->id)->with(['educationaldegree'])->get();
        //dd($qualifications);
        return view('admin_dashboard.profile.qualifications.index',['qualifications'=>$qualifications]);
    }

    public function fetch(Request $request)
    {
        $qualification = UserQualification::where('id', $request->qualification_id)->with(['educationaldegree'])->first();
        //dd($qualification);
        $arr = array('data' => $qualification, 'status' => true);
        return Response()->json($arr);
    }

    public function edit(Request $request)
    {
                
                $Date = Carbon::createFromDate();
                $validatedData = $request->validate([
                    'educational_degree_id' => 'bail|required',
                    'organisation' => 'bail|required',
                    'title' => 'bail|required',
                    'description' => 'bail|required',
                    'from_date' => 'required|date|before:'.$Date,
                    'to_date' => 'required|date|before:'.$Date,
                    'marks' => 'required|Numeric',
                    'marks_type' => 'required',
                    'transcript_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
                    ]);
                    try { 

                        if(isset($request->transcript_scan)){

                            $qualificaiton = DB::table('user_qualifications')
                            ->where('id', $request->custId)->first();
                            $directory = "public/user_files/multi_transcript_scans/".$qualificaiton->transcript_scan;

                            if($qualificaiton->transcript_scan != null){
                                Storage::delete($directory);
                            }
                            
                            $file_name_with_ext = $request->file('transcript_scan')->getClientOriginalName();
                            $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                            $extension = $request->file('transcript_scan')->getClientOriginalExtension();
                            $name_to_store = 'transcript_scan_'.Auth::user()->id.'_'.rand().'.'.$extension;
                            $path = $request->file('transcript_scan')->storeAs('public/user_files/multi_transcript_scans', $name_to_store);

                        }else{
                            $qualificaiton = DB::table('user_qualifications')
                            ->where('id', $request->custId)->first();
                            $name_to_store = $qualificaiton->transcript_scan;
                        }


        
                        DB::table('user_qualifications')
                        ->where('id', $request->custId)
                        ->update(['title' => $request->title ,'user_id' => Auth::user()->id, 'educational_degree_id' => $request->educational_degree_id, 'organisation' => $request->organisation, 'description' => $request->description, 'from_date' => $request->from_date, 'to_date' => $request->to_date, 'marks' => $request->marks, 'marks_type' => $request->marks_type, 'transcript_scan' => $name_to_store,'updated_at' => Carbon::now(),]);
                        

        
        
        
                        $arr = array('msg' => 'Qualification Updated Successfully', 'status' => true);
                        $request->session()->flash('form_success', 'Qualification Updated Successfully');
        
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
            'title' => 'bail|required',
            'description' => 'bail|required',
            'from_date' => 'required|date|before:'.$Date,
            'to_date' => 'required|date|before:'.$Date,
            'marks' => 'required|Numeric',
            'marks_type' => 'required',
            'transcript_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
            ]);
            try {
                if(isset($request->transcript_scan)){
                    $files_array = $request->all(); 
                    $file_name_with_ext = $request->file('transcript_scan')->getClientOriginalName();
                    $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $request->file('transcript_scan')->getClientOriginalExtension();
                    $name_to_store = 'transcript_scan_'.Auth::user()->id.'_'.rand().'.'.$extension;
                    $path = $request->file('transcript_scan')->storeAs('public/user_files/multi_transcript_scans', $name_to_store);
                }else{
                    $name_to_store = null;
                }


            DB::table('user_qualifications')->insert(
                ['title' => $request->title ,'user_id' => Auth::user()->id, 'educational_degree_id' => $request->educational_degree_id, 'organisation' => $request->organisation, 'description' => $request->description, 'from_date' => $request->from_date, 'to_date' => $request->to_date, 'marks' => $request->marks, 'marks_type' => $request->marks_type, 'transcript_scan' => $name_to_store,'created_at' => Carbon::now(),]
            );
                $arr = array('msg' => 'New Qualification Added Successfully', 'status' => true);
                $request->session()->flash('form_success', 'New Qualification Added Successfully');

            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }

            return Response()->json($arr);

        // $projects = User::where('id',Auth::user()->id)->get();
        // return view('admin_dashboard.profile.projects.index',['projects'=>$projects]);
    }

    public function delete(Request $request)
    {
        $qualificaiton = DB::table('user_qualifications')
                        ->where('id', $request->id)->first();
        $directory = "public/user_files/multi_transcript_scans/".$qualificaiton->transcript_scan;      
        if($qualificaiton->transcript_scan != null){
            Storage::delete($directory);
        }
        DB::table('user_qualifications')->delete($request->id);
        $request->session()->flash('qualification_deleted', 'Qualification Deleted Successfully');
        $arr = array('msg' => 'Qualification Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }


}
