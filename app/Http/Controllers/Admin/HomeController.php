<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        //this returns to home view after successfully login.
        $log_activity = DB::table('users_log_activity')
                        ->where('user_id',Auth::user()->id)
                        ->whereRaw('Date(created_at) = CURDATE()')
                        ->get();
        $ativity_array = [];
        $counter = 0;
        $todays_overall_secs = 0;
        $arraycount = count($log_activity);
        foreach ($log_activity as $key => $value) {

            if($value->activity_type == "login"){
                $ativity_array[$counter]['login'] = $value->activity_time;
            }

            if($value->activity_type == "logout" && $counter != 0){
                $counter -= 1;
                $ativity_array[$counter]['logout'] = $value->activity_time;

                //CALCULATE DURATION OF EACH LOGIN DURATION IN SEONDS
                if($ativity_array[$counter]['logout'] != null && isset($ativity_array[$counter]['logout'])){
                    $duration = $ativity_array[$counter]['logout'] - $ativity_array[$counter]['login'];
                    $ativity_array[$counter]['duration'] = $duration;
                    $todays_overall_secs += $duration;
                }
                $counter += 1;
            }
            //CALCULATE LAST LOGIN WITH CURRENT TIME IF USER IS NOT LOGGED OUT
            if($arraycount == ($counter + 1) && $value->activity_type == "login"){
                $duration = Carbon::now()->getTimestamp() - $ativity_array[$counter]['login'];
                $ativity_array[$counter]['duration'] = $duration;
                $todays_overall_secs += $duration;
            }

            $counter ++;

        }
        // echo $todays_overall_secs;
        // dd($ativity_array);
        $todays_log_time_duation = gmdate("H:i:s",$todays_overall_secs);
        return view('admin_dashboard.home',['todays_log_time_duation'=>$todays_log_time_duation]);
    }
}
