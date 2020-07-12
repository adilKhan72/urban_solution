<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Country;

class CountryController extends Controller
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
    public function index()
    {
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function CountrySelect(Request $request)
    {
        if(isset($request->searchTerm)){   
            $query = Country::where('title', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('title', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = Country::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $city){
            $response[] = array(
                "id" => $city['id'],
                "text" => $city['title']
            );
            }
            //dd($response);
            return json_encode($response);
    }


}
