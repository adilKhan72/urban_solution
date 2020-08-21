<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UnitForArea;

class UnitForAreaController extends Controller
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
    public function UnitSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = UnitForArea::where('unit_type', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('unit_type', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = UnitForArea::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $unit){
            $unitarea = $unit['unit_type']. " ( In Sq Feets: " .$unit['area_in_feet']." )";
            $response[] = array(
                "id" => $unit['id'],
                "text" => $unitarea
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
