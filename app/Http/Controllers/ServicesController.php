<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service;

class ServicesController extends Controller
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
    public function ServiceSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = Service::where('name', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('name', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = Service::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $unit){

            $response[] = array(
                "id" => $unit['id'],
                "text" => $unit['name']
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
