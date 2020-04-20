<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\BloodGroup;

class BloodGroupController extends Controller
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
    public function BloodGroupSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = BloodGroup::where('blood_type', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('blood_type', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = BloodGroup::get();
        }

        $response = array();

            // Read Data
            foreach($query as $city){
            $response[] = array(
                "id" => $city['id'],
                "text" => $city['blood_type']
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
