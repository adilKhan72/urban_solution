<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
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
    public function SelectEmployeeStatus(Request $request)
    {
        

            $type = DB::select(DB::raw('SHOW COLUMNS FROM users WHERE Field = "status"'))[0]->Type;
            preg_match('/^enum\((.*)\)$/', $type, $matches);
            $values = array();

            foreach(explode(',', $matches[1]) as $value){
                $values[] = trim($value, "'");
            }

        $response = array();
            // Read Data
            foreach($values as $status){
            $response[] = array(
                "id" => $status,
                "text" => $status
            );
            }
            
            return json_encode($response);

    }

    public function SelectGender(Request $request)
    {
        

            $type = DB::select(DB::raw('SHOW COLUMNS FROM user_information WHERE Field = "gender"'))[0]->Type;
            preg_match('/^enum\((.*)\)$/', $type, $matches);
            $values = array();

            foreach(explode(',', $matches[1]) as $value){
                $values[] = trim($value, "'");
            }

        $response = array();
            // Read Data
            foreach($values as $status){
            $response[] = array(
                "id" => $status,
                "text" => $status
            );
            }
            
            return json_encode($response);

    }

}
