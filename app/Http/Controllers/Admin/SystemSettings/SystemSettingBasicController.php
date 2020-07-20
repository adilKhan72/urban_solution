<?php

namespace App\Http\Controllers\Admin\SystemSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;

class SystemSettingBasicController extends Controller
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
        Return view('admin_dashboard.system_setting.index');
    }

    public function updateFavicon(Request $request)
    {
        $validatedData = $request->validate([
            'favicon_logo' => 'bail|dimensions:ratio=1/1|mimes:png|max:1999',
            ],[
                'dimensions' => 'The :attribute dimensions must be square e.g ( 800/800 pixels ).',
            ]);
            $files_array = $request->all(); 
            unset($files_array['form']);
            //dd($request->file());
            try { 

                    $file_name_with_ext = $request->file('favicon_logo')->getClientOriginalName();
                    $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $request->file('favicon_logo')->getClientOriginalExtension();
                    $name_to_store = 'favicon_logo.'.$extension;
                    $path = $request->file('favicon_logo')->storeAs('public/system_files/', $name_to_store);
                    DB::table('system_settings')->updateOrInsert(['setting_field' => 'favicon_logo','setting_value' => $name_to_store]);

                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        
            return Response()->json($arr);
    }

    public function updateHeaderLogo(Request $request)
    {
        $validatedData = $request->validate([
            'header_logo' => 'bail|mimes:jpeg|max:1999',
            ]);
            $files_array = $request->all(); 
            unset($files_array['form']);
            //dd($request->file());
            try { 

                    $file_name_with_ext = $request->file('header_logo')->getClientOriginalName();
                    $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $request->file('header_logo')->getClientOriginalExtension();
                    $name_to_store = 'header_logo.'.$extension;
                    $path = $request->file('header_logo')->storeAs('public/system_files/', $name_to_store);
                    DB::table('system_settings')->updateOrInsert(['setting_field' => 'header_logo','setting_value' => $name_to_store]);

                $arr = array('msg' => 'Fields Updated Successfully', 'status' => true);
                $request->session()->flash('form_success', 'Fields Updated Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        
            return Response()->json($arr);
    }

}
