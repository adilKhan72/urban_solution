<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mouza;

class MouzasController extends Controller
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
    public function MouzaSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = Mouza::where('name', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('name', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = Mouza::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $unit){
            $unitarea = $unit['name']. " : " .$unit['area']." Sq Ft";
            $response[] = array(
                "id" => $unit['id'],
                "text" => $unitarea
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
