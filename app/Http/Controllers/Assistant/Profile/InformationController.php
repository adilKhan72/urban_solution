<?php

namespace App\Http\Controllers\Assistant\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use App\Skill;
use App\User;
use App\UserInformation;
use App\BloodGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class InformationController extends Controller
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
        $bloodgroups = DB::table('blood_groups')->get();
        $user = User::where('id',Auth::user()->id)->with(['roles','userinformation.city','userinformation.country','userinformation.bloodgroup'])->first();
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        return view('assistant_dashboard.profile.informations.index',['user'=>$user]);
    }
    public function Store(Request $request)
    { 
        if($request->form == "form_1"){
            $Date = Carbon::createFromDate(2002);
               $validatedData = $request->validate([
                    'gender' => 'required',
                    'phone' => 'nullable|Numeric|digits_between:11,15',
                    'dob' => 'nullable|date|before:'.$Date,
                    'blood_group_id' => 'required|Numeric'
                    ]);
            try { 
                DB::table('user_information')
                ->where('user_id', Auth::user()->id)
                ->update(['gender' => $request->gender,'phone' => $request->phone,'dob' => $request->dob,'blood_group_id' => $request->blood_group_id,]);
                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        }
        if($request->form == "form_2"){
            $validatedData = $request->validate([
            'city_id' => 'required|Numeric',
            'country_id' => 'required|Numeric',
            'primary_address' => 'nullable|regex:/^\s*(?:[a-zA-Z0-9_ .]+\s*,\s*){4}(?:[a-zA-Z0-9_ .]+\s*)$/',
            'secondary_address' => 'nullable|regex:/^\s*(?:[a-zA-Z0-9_ .]+\s*,\s*){4}(?:[a-zA-Z0-9_ .]+\s*)$/',
            'google_location_pin' => 'nullable|regex:/^\w+$/u'
            ]);
            $primary_address_arr = json_encode(explode(",",$request->primary_address));
            $secondary_address_arr = json_encode(explode(",",$request->secondary_address));
            $google_location_pin_arr = json_encode($request->google_location_pin);
            try { 
                DB::table('user_information')
                ->where('user_id', Auth::user()->id)
                ->update(['city_id' => $request->city_id,'country_id' => $request->country_id,'primary_address' => $primary_address_arr,'secondary_address' => $secondary_address_arr,'google_location_pin' => $google_location_pin_arr,]);
                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        }
        if($request->form == "form_3"){
            $validatedData = $request->validate([
            'profile_pic' => 'bail|dimensions:ratio=1/1|nullable|mimes:jpeg,jpg,png|max:1999',
            'id_card_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
            'cv_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
            'police_clearance_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999',
            'personal_portfoliio_scan' => 'bail|nullable|file|mimes:jpeg,jpg,png|max:1999'
            ],[
                'dimensions' => 'The :attribute dimensions must be square e.g ( 800/800 pixels ).',
            ]);
            $files_array = $request->all(); 
            unset($files_array['form']);
            try { 
                foreach ($files_array as $key => $value) {
                    $file_name_with_ext = $request->file($key)->getClientOriginalName();
                    $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $request->file($key)->getClientOriginalExtension();
                    $name_to_store = $key.'_'.Auth::user()->id.'.'.$extension;
                    $path = $request->file($key)->storeAs('public/user_files/'.$key, $name_to_store);
                    DB::table('users')->where('id', Auth::user()->id)->update([$key => $name_to_store]);
                }
                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        }
        if($request->form == "form_4"){
            $validatedData = $request->validate([
            'first_name' => 'bail|alpha|required|nullable|',
            'middle_name' => 'bail|alpha|nullable|',
            'last_name' => 'bail|alpha|nullable|',
            'email' => 'bail|required|unique:users,email,'.Auth::user()->id.',id',
            ]);
            try { 
                DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['first_name' => $request->first_name,'middle_name' => $request->middle_name,'last_name' => $request->last_name,'email' => $request->email,]);
                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        }
        if($request->form == "form_5"){
            
            $validatedData = $request->validate([
            'joining_date' => 'required',
            'id_card_number' => 'nullable|unique:users,id_card_number,'.Auth::user()->id.',id',
            'description' => 'nullable|regex:/[^A-Za-z0-9]/'
            ]);

            //rules for making employee number from joing date (timestamp) plus user id plus 00. 
            $employee_number = '00'.Auth::user()->id.'_'.strtotime($request->joining_date);
            try { 
                DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['joining_date' => $request->joining_date,'id_card_number' => $request->id_card_number,'description' => $request->description,'employee_number'=> $employee_number]);
                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        }
        
        return Response()->json($arr);
    }

   

}
